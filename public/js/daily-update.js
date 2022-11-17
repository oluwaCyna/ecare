let comment = document.getElementById('new-comment');
let treatment = document.getElementById('new-treatment');
let drip = document.getElementById('new-drip');
let drug = document.getElementById('new-drug');
let injection = document.getElementById('new-injection');

let addComment = document.getElementById('add-new-comment');
let addTreatment = document.getElementById('add-new-treatment');
let addDrip = document.getElementById('add-new-drip');
let addDrug = document.getElementById('add-new-drug');
let addInjection = document.getElementById('add-new-injection');

let hideComment = document.getElementById('hide-new-comment');
let hideTreatment = document.getElementById('hide-new-treatment');
let hideDrip = document.getElementById('hide-new-drip');
let hideDrug = document.getElementById('hide-new-drug');
let hideInjection = document.getElementById('hide-new-injection');

comment.style.display = 'none';
treatment.style.display = 'none';
drip.style.display = 'none';
drug.style.display = 'none';
injection.style.display = 'none';

hideComment.style.display = 'none';
hideTreatment.style.display = 'none';
hideDrip.style.display = 'none';
hideDrug.style.display = 'none';
hideInjection.style.display = 'none';


addComment.addEventListener('click', function(e) {
    e.preventDefault();
    comment.style.display = 'flex';
    addComment.style.display = 'none';
    hideComment.style.display = 'block';

});

hideComment.addEventListener('click', function(e) {
    e.preventDefault();
    comment.style.display = 'none';
    addComment.style.display = 'block';
    hideComment.style.display = 'none';
   
});

addTreatment.addEventListener('click', function(e) {
    e.preventDefault();
    treatment.style.display = 'flex';
    addTreatment.style.display = 'none';
    hideTreatment.style.display = 'block';
   
   });
   
hideTreatment.addEventListener('click', function(e) {
    e.preventDefault();
    treatment.style.display = 'none';
    addTreatment.style.display = 'block';
    hideTreatment.style.display = 'none';
    
});

addDrip.addEventListener('click', function(e) {
    e.preventDefault();
    drip.style.display = 'flex';
    addDrip.style.display = 'none';
    hideDrip.style.display = 'block';
   
   });
   
   hideDrip.addEventListener('click', function(e) {
    e.preventDefault();
    drip.style.display = 'none';
    addDrip.style.display = 'block';
    hideDrip.style.display = 'none';
    
});

addDrug.addEventListener('click', function(e) {
    e.preventDefault();
    drug.style.display = 'flex';
    addDrug.style.display = 'none';
    hideDrug.style.display = 'block';
   
   });
   
   hideDrug.addEventListener('click', function(e) {
    e.preventDefault();
    drug.style.display = 'none';
    addDrug.style.display = 'block';
    hideDrug.style.display = 'none';
    
});

addInjection.addEventListener('click', function(e) {
    e.preventDefault();
    injection.style.display = 'flex';
    addInjection.style.display = 'none';
    hideInjection.style.display = 'block';
   
   });
   
   hideInjection.addEventListener('click', function(e) {
    e.preventDefault();
    injection.style.display = 'none';
    addInjection.style.display = 'block';
    hideInjection.style.display = 'none';
    
});