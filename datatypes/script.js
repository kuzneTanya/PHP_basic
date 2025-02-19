document.querySelector('#partstart').addEventListener('click', () => {  
    document.querySelector('#parttable').classList.toggle('show');
})

document.querySelector('#mergestart').addEventListener('click', () => {  
    document.querySelector('#mergetable').classList.toggle('show');
})

document.querySelector('#shortstart').addEventListener('click', () => {
    document.querySelector('#shorttable').classList.toggle('show');
})

document.querySelector('#genderstart').addEventListener('click', () => {
    document.querySelector('#gendertable').classList.toggle('show');
})

document.querySelector('#genderStatstart').addEventListener('click', () => {
    document.querySelector('#genderstat').classList.toggle('show');
})

document.querySelector('#loveMeterstart').addEventListener('click', () => {
    document.querySelector('#loveMeter').classList.toggle('show');
})

// document.querySelector('#divName').addEventListener('click', () => {
//     document.querySelector('#nameTable').innerHTML = `<?php echo "something"?>`;
// })