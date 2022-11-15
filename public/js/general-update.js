let comment = document.getElementById('new-comment');
let diagnosis = document.getElementById('new-diagnosis');
let test = document.getElementById('new-test');
let scan = document.getElementById('new-scan');
let drip = document.getElementById('new-drip');
let drug = document.getElementById('new-drug');
let injection = document.getElementById('new-injection');

let addComment = document.getElementById('add-new-comment');
let addDiagnosis = document.getElementById('add-new-diagnosis');
let addTest = document.getElementById('add-new-test');
let addScan = document.getElementById('add-new-scan');
let addDrip = document.getElementById('add-new-drip');
let addDrug = document.getElementById('add-new-drug');
let addInjection = document.getElementById('add-new-injection');

let hideComment = document.getElementById('hide-new-comment');
let hideDiagnosis = document.getElementById('hide-new-diagnosis');
let hideTest = document.getElementById('hide-new-test');
let hideScan = document.getElementById('hide-new-scan');
let hideDrip = document.getElementById('hide-new-drip');
let hideDrug = document.getElementById('hide-new-drug');
let hideInjection = document.getElementById('hide-new-injection');

comment.style.display = 'none';
diagnosis.style.display = 'none';
test.style.display = 'none';
scan.style.display = 'none';
drip.style.display = 'none';
drug.style.display = 'none';
injection.style.display = 'none';

hideComment.style.display = 'none';
hideDiagnosis.style.display = 'none';
hideTest.style.display = 'none';
hideScan.style.display = 'none';
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

addDiagnosis.addEventListener('click', function(e) {
    e.preventDefault();
    diagnosis.style.display = 'flex';
    addDiagnosis.style.display = 'none';
    hideDiagnosis.style.display = 'block';
   
   });
   
hideDiagnosis.addEventListener('click', function(e) {
    e.preventDefault();
    diagnosis.style.display = 'none';
    addDiagnosis.style.display = 'block';
    hideDiagnosis.style.display = 'none';
    
});

addTest.addEventListener('click', function(e) {
    e.preventDefault();
    test.style.display = 'flex';
    addTest.style.display = 'none';
    hideTest.style.display = 'block';
   
   });
   
   hideTest.addEventListener('click', function(e) {
    e.preventDefault();
    test.style.display = 'none';
    addTest.style.display = 'block';
    hideTest.style.display = 'none';
    
});

addScan.addEventListener('click', function(e) {
    e.preventDefault();
    scan.style.display = 'flex';
    addScan.style.display = 'none';
    hideScan.style.display = 'block';
   
   });
   
   hideScan.addEventListener('click', function(e) {
    e.preventDefault();
    scan.style.display = 'none';
    addScan.style.display = 'block';
    hideScan.style.display = 'none';
    
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
    hideDrip.style.display = 'block';
   
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