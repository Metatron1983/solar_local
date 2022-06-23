
const show_uploaded_image = (class_name_arr) => {
    class_name_arr.forEach((class_name)=>{
        const img_input = document.querySelector(class_name + '.image-input');
        const img = document.querySelector(class_name + '.image');  
        
        img_input.addEventListener('change', function(){
            const fileList = this.files;
            img.src = window.URL.createObjectURL(fileList[0]);
        });
    });
}

export {show_uploaded_image};