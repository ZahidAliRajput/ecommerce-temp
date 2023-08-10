let waitforname =setInterval(function(){
    let name=   document.querySelector(`[id*="step-order"] [name="name"]`);
        if(name){

            let oldlead = localStorage.getItem('_ud')||'';
            if(oldlead==""){
                name.value='New Lead'+new Date().getTime();
                name.dispatchEvent(new Event('input'));  
        clearInterval(waitforname);
            }
        }
    },500);