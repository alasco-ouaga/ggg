
$(document).ready(function () { 

    //Devenir agent become-agent-modale username_input user_email_input
    $(".become-agent-modal").click(function(){
        console.log(document.getElementById('user_id').value);
        document.getElementById('user_id_input').value = document.getElementById('user_id').value;
        console.log("le mail est : " + document.getElementById('user_email').value)
    });

    $(".save-become-agent-data").click(function(){
        const document_file_input = document.getElementById('document-file');
        const avatar_file_input = document.getElementById('avatar-file');
        const document_file = document_file_input.files[0];  // Récupérez le fichier lui-même
        const avatar_file = avatar_file_input.files[0];  // Récupérez le fichier lui-même
        const document_type = document.getElementById('document-type').value;
        const user_id = document.getElementById('user_id_input').value;
        let _token = $('meta[name="csrf-token"]').attr('content');

        console.log("document file " + document_file)
        console.log("Id du client " + user_id)

        const formData = new FormData();
        formData.append('user_id', user_id);
        formData.append('document_type', document_type);
        formData.append('document_file', document_file);
        formData.append('avatar_file', avatar_file);
        formData.append('_token', _token);

        if(document_file_input.files.length > 0){
            $(".processed-message").show()
            $(".modal-document").hide()
            $(".disabled").show()
            $(".save-become-agent-data").hide()
            request = $.ajax({
                url: "/api/v1/account/become/agent/data",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
            });
    
            request.done(function (response, textStatus, jqXHR) {   
                console.log("response :"+response)         
                $(".success-message").hide()
                $(".disabled").hide()
                document.getElementById("close-btn").className="btn btn-success";
                document.getElementById("success-info").textContent="Votre demande a été envoyée avec succes.";
            })
        
            request.fail(function (jqXHR, textStatus, errorThrown) {
              console.error("Erreur: " +textStatus, errorThrown);
            })
        }
        else{
            alert('Aucune image sélectionnée.');
        }
    });


    $('.reoppen-modal').click ( function() {
        let _token = $('meta[name="csrf-token"]').attr('content');
        console.log("token :"+_token);
        $(".withclick-programing-btn").hide()

        request = $.ajax({
            url: "/api/v1/programing/data",
            type: "get",
            data: {_token}
        });
        request.done(function (response, textStatus, jqXHR) {
            console.log("resultat :"+response)
            if(response.data != null){
                if(response.category != null){
                    $('.withclick_modal_category').show()
                }
                if(response.data["location"] != null){
                    $('.withclick_modal_city').show()
                }
                if(response.data["type"] != null){
                    $('.withclick_modal_type').show()
                }
                if(response.data["min_price" ] != null){
                    $('.withclick_modal_min_price').show()
                }
                if(response.data["max_price" ] != null){
                    $('.withclick_modal_max_price').show()
                }
                if(response.data["keyword"] != null){
                    $('.withclick_modal_keys').show()  
                }
                if(response.data["bedroom"] != null){
                    $('.withclick_modal_bedroom').show()  
                }
                if(response.data["bathroom"] != null){
                    $('.withclick_modal_bathroom').show()  
                }
                if(response.data["floor"] != null){
                    $('.withclick_modal_floor').show()  
                }
    
                //span type
                if(response.data["type"] =="sale"){
                    document.getElementById("withclick_modal_type").textContent="Vente"
                }
                if(response.data["type"] =="rent"){
                    document.getElementById("withclick_modal_type").textContent="Location"
                }

                $('.withclick_data_container').show() 

                document.getElementById("withclick_modal_category").textContent=response.category;
                document.getElementById("withclick_modal_min_price").textContent=response.data["min_price"]
                document.getElementById("withclick_modal_max_price").textContent=response.data["max_price"]
                document.getElementById("withclick_modal_keys").textContent=response.data["keyword"]
                document.getElementById("withclick_modal_bedroom").textContent=response.data["bedroom"]
                document.getElementById("withclick_modal_bathroom").textContent=response.data["bathroom"]
                document.getElementById("withclick_modal_floor").textContent=response.data["floor"]

                if(response.city != null){
                    document.getElementById("withclick_modal_city").textContent=response.city
                    document.getElementById("withclick_city_id_input").value=response.city_id;
                }
                else{
                    document.getElementById("withclick_modal_city").textContent=response.data["location"]
                }
    
                //input
                document.getElementById("withclick_type_input").value=response.data["type"]
                document.getElementById("withclick_city_input").value=response.data["location"]
                document.getElementById("withclick_city_id_input").value=response.city_id
                document.getElementById("withclick_keys_input").value=response.data["keyword"]
                document.getElementById("withclick_min_price_input").value=response.data["min_price"]
                document.getElementById("withclick_max_price_input").value=response.data["max_price"]
                document.getElementById("withclick_bedroom_input").value=response.data["bedroom"]
                document.getElementById("withclick_bathroom_input").value=response.data["bathroom"]
                document.getElementById("withclick_floor_input").value=response.data["floor"]
                document.getElementById("withclick_category_input").value=response.category;
                document.getElementById("withclick_category_id_input").value=response.category_id;
                
            } 
            else {
                $(".data_container").hide()
                $(".isdoing").show()
                $(".save-programming-seach").hide()
            } 
        })
        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.log("Erreur de requette "+textStatus)
        })   
    }); 

    $('.withclick-property-programing-save').click ( function() {
        const type = document.getElementById("withclick_type_input").value;
        const city = document.getElementById("withclick_city_input").value;
        const keys = document.getElementById("withclick_keys_input").value;
        const min_price = document.getElementById("withclick_min_price_input").value;
        const max_price = document.getElementById("withclick_max_price_input").value;
        const bedroom = document.getElementById("withclick_bedroom_input").value;
        const bathroom = document.getElementById("withclick_bathroom_input").value;
        const floor = document.getElementById("withclick_floor_input").value;
        const account_id = document.getElementById("withclick_user_id_input").value;
        const city_id = document.getElementById("withclick_city_id_input").value;
        const category_id =  document.getElementById("withclick_category_id_input").value;
        const category =  document.getElementById("withclick_category_input").value;
        console.log("type : " + type)
        console.log("city : " + city)
        console.log("category_id : " + category_id)
        console.log("l'identifiant du client est : " + account_id)

        if(type != ""){
            $(".withclick_data_container").hide()
            $(".withclick_traitement").show()
            $(".withclick-property-programing-save").hide()
    
            document.getElementById("withclick_close").className="btn btn-dark btn-close";
            let _token = $('meta[name="csrf-token"]').attr('content');
            request = $.ajax({
                url: "/api/v1/property/programing/save",
                type: "post",
                data: {account_id,
                        city_id,
                        category,
                        category_id,
                        type,
                        city,
                        keys,
                        min_price,
                        max_price,
                        bedroom,
                        bathroom,
                        floor,
                        _token}
            });
    
            request.done(function (response, textStatus, jqXHR) {   
                console.log("reponse :" + response)         
                $(".withclick_traitement").hide()
                $(".withclick_save-programming-seach").hide()
                $(".withclick_programing_success").show()
                $(".withclick-programing-btn").hide()
                
                document.getElementById("withclick_close").className="btn btn-success btn-close";
            })
        
            request.fail(function (jqXHR, textStatus, errorThrown) {
              console.error("Erreur: " +textStatus, errorThrown);
            })

        }
        else{
            alert("Le type de propriété n'est pas precisé :Acceder a l'acceuil est selectionner le type de propriété recherché")
        }
    }); 

    $('.button-search-getdata').click ( function() {
        
        var $city = document.getElementById("location").value;
        console.log("la ville :" + $city)
        let _token = $('meta[name="csrf-token"]').attr('content');
        request = $.ajax({
            url: "/api/v1/property/programing/click",
            type: "post",
            data: {$city ,_token}
        });

        request.done(function (response, textStatus, jqXHR) {   
            console.log("reponse :" + response.data)         
        })
    
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error("Erreur: " +textStatus, errorThrown);
        })
    }); 

    $('.get-city-id').click ( function() {
        
        const city_id = document.getElementById("city_id").value;
        console.log("city_id : "+city_id)

        request = $.ajax({
            url: "/api/v1/city/"+ city_id,
            type: "get",
            data: {}
        });

        request.done(function (response, textStatus, jqXHR) {   
            console.log("reponse city_id:" + response) 
            var locationAttributsDiv = document.getElementsByClassName("select-location-fields")[0];
            console.log(locationAttributsDiv);
            localities = response.localities;

            var get_create = document.getElementsByClassName("new-create")[0];
            if(get_create){
                var select = document.getElementsByClassName("select-id")[0];
                for (var i = select.options.length - 1; i >= 0; i--) {
                    select.remove(i);
                }

                localities.forEach(function(element) {
                    var option = document.createElement("option");
                    option.textContent = element['name'];
                    option.value = element['id'];
                    select.appendChild(option)
                });
                return
            }
            else{
                var newDiv = document.createElement("div");
                newDiv.className = "row new-create";
    
                var label = document.createElement("label");
                label.className = "mt-2";
                label.textContent = "Selectionner un lieu";
    
                var select = document.createElement("select");
                select.className = "form-control select-id mb-2";
                select.name = "locality_id";
    
                localities.forEach(function(element) {
                    var option = document.createElement("option");
                    option.textContent = element['name'];
                    option.value = element['id'];
                    select.appendChild(option)
                });
    
                newDiv.appendChild(label)
                newDiv.appendChild(select)
    
                locationAttributsDiv.appendChild(newDiv);
            }

                  
        })
    
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error("Erreur: " +textStatus, errorThrown);
        })
    });


    $('.state-list').click ( function() {
        const country_id = getElementById('contry_id').value;
        console.log(country_id);
        request = $.ajax({
            url: "/api/v1/states/" + country_id,
            type: "get",
            data: {}
        });

        request.done(function (response, textStatus, jqXHR) {   
            console.log("reponse :" + response)         
        })
    
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error("Erreur: " +textStatus, errorThrown);
        })
    });
    
});