var dwrCallCount = 0;
$(document).ready(function() {
    dwr.engine.setTextHtmlHandler(function() {
        alert("Sua sess�o provavelmente expirou.\nFa�a login novamente.");
        location.reload(true);
    });
    dwr.engine.setErrorHandler(function(errorString, exception) {
        alert(errorString);
    });
});
