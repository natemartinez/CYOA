

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

    $.post("testSubmit.php", JSON.stringify(result), function(data){
        let identity = data;
        console.log(identity);
    }, "text")
    .done(function(){
        console.log("request done")
    })
};

/* functions for Character.php */
let userID = {};
let dnaBtn = $("#dna-btn");

function receiveJSON(){
  fetch('info-check.php')
  .then(response => response.json())
  .then(data => {
    userID = {
        "Name": data.name,
        "Mind": data.mind,
        "Social": data.social,
        "Temper": data.temper,
        "Wake": data.wake,
    }
    resultStart(userID);
  })
  .catch(error => {
    console.error('Error:', error);
  });
};


receiveJSON(); // Allows us to use userID values

dnaBtn.click(function(){
    // This function will receive the JSON to affect the styling
    // of the elements
    let brainImg = $('#brain');
    let introSide = $('#intro-img');
    let extroSide = $('#extro-img');
    let earlyBird = $('#earlybird-img');
    let nightOwl = $('#nightowl-img');
    let coldBlood = $('#snowflake-img');
    let hotHead = $('#flame-img');
    
    // raise scale of chosen stats 
    // and lower opacity of other
    switch(userID.Mind){
        case "Logical":
         brainImg.attr('src', '../images/left-brain.png');
         break;
        case "Creative":
         brainImg.attr('src', '../images/right-brain.png');
         break;
    }
    switch(userID.Social){
        case "Introvert":
         introSide.css('width', '7em');
         extroSide.css('opacity', '40%');
         break;
        case "Extrovert":
         extroSide.css('width', '7em');
         introSide.css('opacity', '40%');
         break;
    }
    switch(userID.Wake){
        case "Early Bird":
            earlyBird.css('width', '8em');
            nightOwl.css('opacity', '20%');
         break;
        case "Night Owl":
            nightOwl.css('width', '7em');
            earlyBird.css('opacity', '40%');
         break;
    }
    switch(userID.Temper){
        case "Hot-headed":
            hotHead.css('width', '8em');
            coldBlood.css('opacity', '20%');
         break;
        case "Cold-blooded":
            coldBlood.css('width', '7em');
            hotHead.css('opacity', '40%');
         break;
    }

});

function resultStart(stats){
    let strStat = parseInt($('#str-stat').text());
    let wpStat = parseInt($('#wp-stat').text());
    let techStat = parseInt($('#tech-stat').text());
    let agiStat = parseInt($('#str-stat').text());
    let perStat = parseInt($('#str-stat').text());
    let intStat = parseInt($('#str-stat').text());

   
    switch(stats.Mind){
        case "Logical":
         perStat++;
         intStat++;
         break;
        case "Creative":
         techStat++;
         wpStat++;
         break;
    }
    switch(stats.Social){
        case "Introvert":
            perStat++;
            techStat++;
            intStat++;
         break;
        case "Extrovert":
            strStat++;
            wpStat++;
            agiStat++;
         break;
    }
    switch(stats.Wake){
        case "Early Bird":
            strStat++;
            intStat++;
         break;
        case "Night Owl":
            wpStat++;
            perStat++;
         break;
    }
    switch(stats.Temper){
        case "Hot-headed":
            strStat++;
            wpStat++;  
         break;
        case "Cold-blooded":
            techStat++;
            agiStat++;
         break;
    }


    let intStats = {
     "Strength": strStat,
     "Willpower": wpStat,
     "Technique": techStat,
     "Agility": agiStat,
     "Perception": perStat,
     "Intuition": intStat,
    }
    console.log(intStats);

    const sendStatChange = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(intStats)
      };

    fetch('stat-change.php', sendStatChange)
    .then(response => response.json())
    .then(data => {
      console.log(data);
    })
    .catch(error => {
      console.error('Error:', error);
    });
}
