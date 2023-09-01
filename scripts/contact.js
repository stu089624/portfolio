window.onsubmit = (event) => {
    event.preventDefault()
    const form = [] 
    const validatie = []

    const input = document.querySelectorAll(".input")
    
    input.forEach(item => {
        form.push({ name: item.name, value: item.value });
    }); 

    form.forEach(item => {
        if (item.value == '' && item.name != "telefoon" && item.name != "bedrijf") {
            document.getElementById(item.name).style.border = '1px solid #C34444'
            document.getElementById(`${item.name}Error`).innerText = "verplicht"
        }  else {

            try {

                if (item.name == "bericht" && item.value.length < 20){
                    document.getElementById(item.name).style.border = '1px solid #C34444'
                    document.getElementById(`${item.name}Error`).innerText = "moet minimaal 20 karakters bevatten"
                }

                else if(item.name == "naam" && item.value.length >= 32){
                    console.log("moet minimaal")
                    document.getElementById(item.name).style.border = '1px solid #C34444'
                    document.getElementById(`${item.name}Error`).innerText = "mag maximaal 32 karakters bevatten"
                }

                else if(item.name == "email" && item.value.length >= 40){
                    document.getElementById(item.name).style.border = '1px solid #C34444'
                    document.getElementById(`${item.name}Error`).innerText = "mag maximaal 40 karakters bevatten"
                }
                else {
                    document.getElementById(item.name).style.border = '1px solid #040D12'
                    document.getElementById(`${item.name}Error`).innerText = ""
                    validatie.push(item.name)
                }
            
            } catch {}
        }
    })

    if(validatie.length >= 3){
        input.forEach(input => {
            input.value = ''
        })
    }
}