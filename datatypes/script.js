document.querySelector('#partstart').addEventListener('click', () => {
    if (document.querySelector('#parttable').className === 'collapse')    
        document.querySelector('#parttable').classList.add('show');
    else document.querySelector('#parttable').className = 'collapse';
})

document.querySelector('#mergestart').addEventListener('click', () => {
    if (document.querySelector('#mergetable').className === 'collapse')    
        document.querySelector('#mergetable').classList.add('show');
    else document.querySelector('#mergetable').className = 'collapse';
})

document.querySelector('#shortstart').addEventListener('click', () => {
    if (document.querySelector('#shorttable').className === 'collapse')    
        document.querySelector('#shorttable').classList.add('show');
    else document.querySelector('#shorttable').className = 'collapse';
})

document.querySelector('#genderstart').addEventListener('click', () => {
    if (document.querySelector('#gendertable').className === 'collapse')    
        document.querySelector('#gendertable').classList.add('show');
    else document.querySelector('#gendertable').className = 'collapse';
})

document.querySelector('#genderStatstart').addEventListener('click', () => {
    if (document.querySelector('#genderstat').className === 'collapse')    
        document.querySelector('#genderstat').classList.add('show');
    else document.querySelector('#genderstat').className = 'collapse';
})

// document.querySelector('#divName').addEventListener('click', () => {
//     document.querySelector('#nameTable').innerHTML = `<?php echo "something"?>`;
// })