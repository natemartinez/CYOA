
$('#open-menu').click(function(){
   $('.main-menu').toggleClass('main-menu-active');
});
$('#close-menu').click(function(){
    $('.main-menu').toggleClass('main-menu-active');
})

// For the character.php page functionality(front-end)

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

// Character test to determine identity 
let mainText = $('#main-text');

let hemisphereTrait = ''; // left/right-brained
let socialTrait = ''; //intro/extro-verted
let wakeTrait = ''; //earlyBird/nightOwl
let temperTrait = '';//hotHeaded/coldBlooded

let testButton1 = $('#choice1');
let testButton2 = $('#choice2');
let nextButton = $('#next-btn');
let backButton = $('#back-btn');
let beginButton = $('#begin-btn');
let submitButton = $('#submit-btn');
let dnaBtn = $("#dna-btn");

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

testButton1.click(function(){
    choice = testButton1.text();
    choiceSelect = true;
    
});
testButton2.click(function(){
    choice = testButton2.text();
    choiceSelect = true;
});

beginButton.click(function(){
    let textBox = $('#name-input');
    const nameInput = $('#name-input').val();
    const pswdInput = $('#pswd-input').val();
    
    textBox.css('display', 'none');
    beginButton.css('display', 'none');
    nextButton.css('display', 'unset');
    backButton.css('display', 'unset');

    testButton1.css('display', 'unset');
    testButton1.text(traits[x]);
    testButton2.css('display', 'unset');
    testButton2.text(traits[y]);
    
    mainText.text(questions[i]);
    answer.push(nameInput);
    answer.push(pswdInput);
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
    testButton1.text(traits[x]);
    testButton2.text(traits[y]);

    if(i == 4){
       mainText.text("Your result is complete");
       nextButton.css('display', 'none');
       backButton.css('display', 'none');
       testButton1.css('display', 'none');
       testButton2.css('display', 'none');
       submitButton.css('display', 'unset');
    }
});

backButton.click(function(){
    i -= 1;
    x = x - 2;
    y = y - 2;

    mainText.text(questions[i]);
    testButton1.text(traits[x]);
    testButton2.text(traits[y]);
});

submitButton.click(function(e){
    e.preventDefault();
    sendResults(answer);
    location.href = "pages/character.php";
});

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

// Inventory page


function sendResults(stats){
    let result = {
       "name": stats[0],
       "password": stats[1],
       "mind": stats[2],
       "social": stats[3],
       "wake": stats[4],
       "temper": stats[5],
    };
    $.post("testSubmit.php", JSON.stringify(result), function(data){
        let identity = data;
        console.log(identity);
    }, "text")
    .done(function(){
        console.log("request done")
    })
};

/* functions for displaying stats & test results */
let userID = {};

function receiveJSON(){
  fetch('info-check.php')
  .then(response => response.json())
  .then(data => {
    userID = {
        "Name": data.name,
        "Password": data.password,
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

function resultStart(stats){ //This function initializes stats for user           
    let strStat = 0;
    let wpStat = 0;
    let techStat = 0;
    let agiStat = 0;
    let perStat = 0;
    let intStat = 0;
   
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


    const intStats = {
     "Strength": strStat,
     "Willpower": wpStat,
     "Technique": techStat,
     "Agility": agiStat,
     "Perception": perStat,
     "Intuition": intStat,
    }

    const sendStatChange = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(intStats)
    };

    fetch('stat-change.php', sendStatChange)
    .then(response => response.text())
    .then(data => {
      console.log(data);
    })
    .catch(error => {
      console.error('Error:', error);
    });
    //Send stats to another function

}

// Actual gameplay

//Buttons to play game
let scenarioText = $('#main-text');
let gameButton1 = $('#game-btn1');
let gameButton2 = $('#game-btn2');

let a = 0;
let b = 1;
let itemSlot = $('.item');

itemSlot.click(function(e){
    //grabs info based on id in the slot
    e.preventDefault();
    let itemID = $(this).attr('id');
    let savedInventory = JSON.parse(sessionStorage.getItem('inventory'));
    
    $('#info-name').text(savedInventory[itemID].name);
    $('#info-type').text(savedInventory[itemID].type);
    $('#info-rarity').text(savedInventory[itemID].rarity);
})

// This function will hold inventory
class gameEvent{
    constructor(level,levelName,type){
        this.level = level;
        this.levelName = levelName;
        this.type = type;
    }
};

class Item {
     constructor(name,type,effect,rarity,img){
         this.name = name;
         this.type = type;
         this.effect = effect;
         this.rarity = rarity;
         this.img = img;
     }
};

//Initialize basic item objects
const dice = new Item('Dice', 'Outcome', 'Outcome', 'Common') //Random roll changes the num to affect outcome
const stick = new Item('Stick','Attack','Health', 'Common', '../images/stick.png');
const shirt = new Item('Shirt','Gear','Armor','Common');
const medKit = new Item('Med-Kit', 'Support','Health','Common');

const battle = new gameEvent( 1,'Hallway','battle'); //have types of battles with D&D / Citizen Sleeper before fight

let gameChoices = [{
    //Could use $_GET[] here
    scenario:'Search the floor',
    result:stick,
    resultText:"Cool...You found a stick"
  },
  {
    scenario:'Search the drawer',
    result:shirt,
    resultText:"Sick shirt!...It belonged to a sick person, you sicko"
  },
  {
    scenario:'Leave the room',
    result:battle,
    resultText:"Battle has begun"
  },
  {
    scenario:'Search the drawer',
    result:medKit,
    resultText:"You found a med kit"
  },
  {
    scenario:'Leave the room',
    result:battle,
    resultText:"Battle has begun"
  },
  {
    scenario:'Look under the bed',
    result:shirt,
    resultText:"You found nothing"
  },
  // After first battle
  {
    scenario:'Look under the bed',
    result:shirt,
    resultText:"You found nothing"
  }
]
let inventory = [];


function collectItem(item){
   inventory.push(item);
   sessionStorage.setItem('inventory', JSON.stringify(inventory));

   displayItems();
     
   //code below alerts the user what item they've found
   var x = $('#snackbar');
   x.text('You found a ' + item.name);
   x.addClass('show');
   setTimeout(function(){ x.removeClass('show'); }, 2000);
};

function displayItems(){ 
   let savedInventory = JSON.parse(sessionStorage.getItem('inventory'));
   for(let i=0; i<savedInventory.length;i++){
    // savedInventory[i] = item[i]
    $('#' + i).text(
         savedInventory[i].name
    )
   }

}

function setScenario(){
   
    gameButton1.text(gameChoices[a].scenario);
    gameButton2.text(gameChoices[b].scenario);

    button1Result = gameChoices[a].result;
    button2Result = gameChoices[b].result;

    resultText1 = gameChoices[a].resultText;
    resultText2 = gameChoices[b].resultText;

    a = a + 2;
    b = b + 2; 
    
}
function setOutcome(event, nextEvent){
    //if item is input, fire item event
    //if attack is input, fire attack event
    
    if(event == "nothing"){
        alert('You found nothing')
    };

    if(event instanceof Item){
      collectItem(event);
      scenarioText.text(nextEvent); 

    } else if(event instanceof gameEvent){

        if(event.type == 'battle'){
            alert('battle has begun');
            battleStart(event.level,event.levelName);
        }

    };

    setScenario();
 // use control flow to add item to inventory based on choice
 // Need to fire 
    
};

setScenario();

gameButton1.click(function(){
    setOutcome(button1Result, resultText1);
});
gameButton2.click(function(){
    setOutcome(button2Result, resultText2);
});

