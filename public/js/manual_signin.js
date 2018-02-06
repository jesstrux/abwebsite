var GoogleAuth;
var session_user;

function handleClientLoad() {
  gapi.load('client:auth2', initClient);
}

function initClient() {
  gapi.client.init({
      'clientId': '594273295551-rcm2necj3lss0dhsj0e253bqrco2vcpc.apps.googleusercontent.com',
      'discoveryDocs': ['https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest'],
      'scope': 'https://www.googleapis.com/auth/youtube.force-ssl https://www.googleapis.com/auth/youtubepartner'
  }).then(function () {
    GoogleAuth = gapi.auth2.getAuthInstance();

    GoogleAuth.isSignedIn.listen(updateSigninStatus);

    setSigninStatus();
  });
}

function handleAuthClick(event) {
  // Sign user in after click on auth button.
  GoogleAuth.signIn();
}

function setSigninStatus() {
  var user = GoogleAuth.currentUser.get();
  isAuthorized = user.hasGrantedScopes('https://www.googleapis.com/auth/youtube.force-ssl https://www.googleapis.com/auth/youtubepartner');
  // Toggle button text and displayed statement based on current auth status.
  if (isAuthorized) {
    defineRequest(user);
  }
}

function updateSigninStatus(isSignedIn) {
  setSigninStatus();
}

function createResource(properties) {
  var resource = {};
  var normalizedProps = properties;
  for (var p in properties) {
    var value = properties[p];
    if (p && p.substr(-2, 2) == '[]') {
      var adjustedName = p.replace('[]', '');
      if (value) {
        normalizedProps[adjustedName] = value.split(',');
      }
      delete normalizedProps[p];
    }
  }
  for (var p in normalizedProps) {
    // Leave properties that don't have values out of inserted resource.
    if (normalizedProps.hasOwnProperty(p) && normalizedProps[p]) {
      var propArray = p.split('.');
      var ref = resource;
      for (var pa = 0; pa < propArray.length; pa++) {
        var key = propArray[pa];
        if (pa == propArray.length - 1) {
          ref[key] = normalizedProps[p];
        } else {
          ref = ref[key] = ref[key] || {};
        }
      }
    };
  }
  return resource;
}

function removeEmptyParams(params) {
  for (var p in params) {
    if (!params[p] || params[p] == 'undefined') {
      delete params[p];
    }
  }
  return params;
}

function executeRequest(request) {
  request.execute(function(response) {
    console.log(response);
  });
}

function buildApiRequest(requestMethod, path, params, properties) {
  params = removeEmptyParams(params);
  var request;
  if (properties) {
    var resource = createResource(properties);
    request = gapi.client.request({
        'body': resource,
        'method': requestMethod,
        'path': path,
        'params': params
    });
  } else {
    request = gapi.client.request({
        'method': requestMethod,
        'path': path,
        'params': params
    });
  }
  executeRequest(request);
}


function defineRequest(user) {
  console.log("User was signed in, proceed from here");
  var u = user.w3;
  session_user = {
    name: u.ig,
    image: u.Paa
  };
  console.log(session_user);

  // buildApiRequest('POST',
  //   '/youtube/v3/commentThreads',
  //   {'part': 'snippet'},
  //   {'snippet.channelId': '',
  //    'snippet.videoId': '',
  //    'snippet.topLevelComment.snippet.textOriginal': ''
  // });
}