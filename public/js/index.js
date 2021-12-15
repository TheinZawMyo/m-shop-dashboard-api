const toggleBtn = document.getElementById('toggleBtn');
const menu = document.getElementById('menuList');
const closebtn = document.getElementById('closeBtn');

toggleBtn.addEventListener('click', () => {
    console.log('click')
    menu.classList.toggle('show_menu');
})

closebtn.addEventListener('click', () => {
    menu.classList.remove('show_menu');
});


// privew image for upload 
const img_input = document.getElementById('product_img');
const img_preview = document.getElementById('product_img_preview');
const preview_container = document.getElementById('preview_container');
img_input.addEventListener("change", (e) => {
    console.log(e.target.files)
    if(e.target.files.length > 0 ){
        let src = URL.createObjectURL(e.target.files[0]);
        img_preview.src = src;
        preview_container.style.display = 'block';
    }
})