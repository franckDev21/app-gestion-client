require('./bootstrap');

require('alpinejs');

const btn = document.querySelector('.imageBtn')
const inputFile = document.querySelector('#inputFile')
const img = document.querySelector('#img')

if(btn && inputFile && img){
    
    btn.addEventListener('click', e => {
        e.preventDefault()
        inputFile.click()
    })

    inputFile.addEventListener('change', function(){
        const file = this.files[0]
        if (file) {
            const reader = new FileReader()
            reader.onload = () => {
                const result = reader.result;
                img.src = result;
            };
            reader.readAsDataURL(file);
        }
    })

}
