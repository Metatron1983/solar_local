
const show_uploaded_file = (class_name_arr) => {
    class_name_arr.forEach((class_name)=>{
        const file_input = document.querySelector(class_name + '.file-input');
        const file = document.querySelector(class_name + '.file-p');  
        
        file_input.addEventListener('change', function(){
            const fileList = this.files;
            file.innerText = fileList[0].name;
        });
    });
}

export {show_uploaded_file};