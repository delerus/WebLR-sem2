document.getElementById('test_form').addEventListener('submit', function(event) {
    var answer = document.getElementById("question3");
    var error = '';
    var wordsArray = answer.value.split(" ");
    var wordsAmount = wordsArray.length; 
    
    if (wordsAmount <= 20){ 
        error += 'В развернутом ответе должно быть не менее 20 слов.\n';
        answer.focus();
    }

    if (error !== '') {
        alert(error);
        event.preventDefault();
    }
});