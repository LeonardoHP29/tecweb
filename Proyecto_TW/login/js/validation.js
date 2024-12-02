const validation = new JustValidate("#signup");

validation
    .addField("#name", [
        {
            rule: "required"
        }
    ])
    .addField("#email",[
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => () =>{
                return fetch("../backend/validate-email.php?email=" + 
                    encodeURIComponent(value))
                    .then(function(response){
                        return response.json();
                    })
                    .then(function(json){
                        return json.available;
                    });
            },
            errorMessage: "email ocupado"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#password_confirmation",[
        {
            validator: (value, fields) =>{
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Las contraseñas deben de coincidir"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });