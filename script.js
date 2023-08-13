$('#open-menu').click(function(){
   $('.main-menu').toggleClass('main-menu-active');
});
$('#close-menu').click(function(){
    $('.main-menu').toggleClass('main-menu-active');
})

// For the character.php page functionality

$('#bio-link').click(function(){
    $('#bio-content').removeClass('content-deactive');
    $('#dna-content').addClass('content-deactive');
    $('#stats-content').addClass('content-deactive');
});
$('#dna-link').click(function(){
    $('#dna-content').removeClass('content-deactive');
    $('#bio-content').addClass('content-deactive');
    $('#stats-content').addClass('content-deactive');
});
$('#stats-link').click(function(){
    $('#stats-content').removeClass('content-deactive');
    $('#dna-content').addClass('content-deactive');
    $('#bio-content').addClass('content-deactive');
});
//

// Character test to determine identity 
let mainText = $('#main-text');

let hemisphereTrait = ''; // left/right-brained
let socialTrait = ''; //intro/extro-verted
let wakeTrait = ''; //earlyBird/nightOwl
let temperTrait = '';//hotHeaded/coldBlooded

let choiceButton1 = $('#choice1');
let choiceButton2 = $('#choice2');
let nextButton = $('#next-btn');
let backButton = $('#back-btn');
let beginButton = $('#begin-btn');
let submitButton = $('#submit-btn');

let questions = [
    "Are you Logical or Creative?",
    "Are you Introverted or Extroverted?",
    "Do you prefer to wake up early or stay up later?",
    "What would you say your temper is like?"
];
let traits = [
    'Logical','Creative',
    'Introvert','Extrovert', 
    'Early Bird','Night Owl',
    'Hot-headed','Cold-blooded' 
];

let answer = [];
let choiceSelect = false; // checks if button was selected
let choice = ''; // Holds to chosen value

let i = 0;

let x = 0; // Variables will be used to
let y = 1; // give choice buttons their names with iteration

choiceButton1.click(function(){
    choice = choiceButton1.text();
    choiceSelect = true;
    
});
choiceButton2.click(function(){
    choice = choiceButton2.text();
    choiceSelect = true;
});

beginButton.click(function(){
    let textBox = $('#name-input');
    const nameInput = $('#name-input').val();
    
    textBox.css('display', 'none');
    beginButton.css('display', 'none');
    nextButton.css('display', 'unset');
    backButton.css('display', 'unset');

    choiceButton1.css('display', 'unset');
    choiceButton1.text(traits[x]);
    choiceButton2.css('display', 'unset');
    choiceButton2.text(traits[y]);
    
    mainText.text(questions[i]);
    answer.push(nameInput);
});

nextButton.click(function(){
    if(choiceSelect){
        answer.push(choice);
        choiceSelect = false;
    } else{
        alert('you must select a choice');
        return
    }

    x = x + 2;
    y = y + 2;
    i += 1; 

    mainText.text(questions[i]);
    choiceButton1.text(traits[x]);
    choiceButton2.text(traits[y]);

    if(i == 4){
       mainText.text("Your result is complete");
       nextButton.css('display', 'none');
       backButton.css('display', 'none');
       choiceButton1.css('display', 'none');
       choiceButton2.css('display', 'none');
       submitButton.css('display', 'unset');
    }
});

backButton.click(function(){
    i -= 1;
    x = x - 2;
    y = y - 2;

    mainText.text(questions[i]);
    choiceButton1.text(traits[x]);
    choiceButton2.text(traits[y]);
});

submitButton.click(function(e){
    e.preventDefault();
    sendResults(answer);
    location.href = "pages/character.php";
});

function sendResults(stats){
    let result = {
       "name": stats[0],
       "mind": stats[1],
       "social": stats[2],
       "wake": stats[3],
       "temper": stats[4],
    };

    $.post("stats.php", JSON.stringify(result), function(data){
        let identity = data;
        console.log(identity);
    }, "text")
    .done(function(){
        console.log("request done")
    })

};


// functions for Character.php


//This function will affect the stats on the client-side
function sendStyle(stats){
    console.log(stats);
}
// User object- ID properties

const userStats = {
    name: "",
    health: 100,
    energy: 50,
}

