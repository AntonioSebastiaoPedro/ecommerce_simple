$(Document).ready(function(){
    $('.menu-btn').click(function(){
        $('.sidebar').css({
            'width': '70px',
            'font-size':'35px'
        });
        $('.text-link').hide();
        $('.menu-btn').hide();
        $('.close-btn').show();
    });

    $('.close-btn').click(function(){
        $('.sidebar').css({
            'width': '300px',
            'font-size':'16px'
        });
        $('.text-link').show();
        $('.menu-btn').show();
        $('.close-btn').hide();
    });
});








//script do upload de imagens

    const uploadInput = document.querySelector('#upload-input') ;
const previewImg = document.querySelector('.upload-img img') ;

uploadInput.addEventListener('change',e => {
    if(e.target.files.length > 0) {
        const url = URL.createObjectURL(e.target.files[0]) ;
        previewImg.src = url ;
    }
})