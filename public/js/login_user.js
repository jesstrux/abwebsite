// <script src="https://smartlock.google.com/client"></script>
var GOOGLE_CLIENT_ID = "594273295551-rcm2necj3lss0dhsj0e253bqrco2vcpc.apps.googleusercontent.com";

window.onGoogleYoloLoad = function(googleyolo){
    console.log("Detecting user.");

    const retrievePromise = googleyolo.retrieve({
        supportedAuthMethods: [
            "https://accounts.google.com"
//					,"googleyolo://id-and-password"
        ],
        supportedIdTokenProviders: [{uri: "https://accounts.google.com", clientId: GOOGLE_CLIENT_ID}]
    });

    retrievePromise.then(
        function(credential) {
            console.log("Some credentials are available");

            if (credential.password) {
                signInWithEmailAndPassword(credential.id, credential.password);
            } else {
                getUserWithToken(credential.idToken);
            }
        },
        function(error){
            if (error.type === 'noCredentialsAvailable') {
                console.log("No credentials available");
            }
        }
    );
};

function getUserWithToken(TOKEN) {
    $.ajax({
        dataType: "jsonp",
        type: 'GET',
        url: "https://www.googleapis.com/oauth2/v3/tokeninfo?id_token="+TOKEN,
        success: function(result){
            console.log(result);
        }});
}