
$(document).ready(function () { 

    $('.get-avance').click(function () {
        // Sélectionnez l'élément <a> que vous voulez modifier.
        const input = document.getElementById("input_text").value;
        const lien = document.getElementById("monLien");
        document.getElementById("input_text").value = lien.textContent
        // Modifiez le texte à l'intérieur de la balise <a>.
        lien.textContent = input;
    });
    
    function CreatJsonVarriable() {
        let mydata = {
            type_value: null,
            type_text: 0,
            project: null,
            category_value: 0,
            category_text: null,
            prix_min: 0,
            prix_max: 0,
            nb_chambre: 0,
            nb_douche: 0,
            nb_etage: 0,
        };

        //Objet en string
        let programing_data = JSON.stringify(mydata);

        // Objet string en session
        sessionStorage.setItem('programing_data',programing_data);
      }

    function UpdateType(objet,data1, data2) {
        //Modification de la donnée
        objet.type_value = data1
        objet.type_text = data2
        console.log("Nouveau type: " + objet.type_text)

        //Objet en string
        let programing_data = JSON.stringify(objet);

        // Objet string en session
        sessionStorage.setItem('programing_data',programing_data);
    }

    function UpdateProject(objet,data) {
        //Modification de la donnée
        objet.project = data
        console.log("project in session is modified : " + objet.project)

        //Objet en string
        let programing_data = JSON.stringify(objet);

        // Objet string en session
        sessionStorage.setItem('programing_data',programing_data);
    }

    function UpdateCategory(objet,data1,data2) {
        //Modification de la donnée
        objet.category_value = data1
        objet.category_text = data2
        console.log("Nouvelle categorie: " + objet.category_text)

        //Objet en string
        let programing_data = JSON.stringify(objet);

        // Objet string en session
        sessionStorage.setItem('programing_data',programing_data);
    }

    function UpdatePrixMin(objet,data) {
        //Modification de la donnée
        objet.prix_min = data
        console.log("Nouveau prix min : " + objet.prix_min)

        //Objet en string
        let programing_data = JSON.stringify(objet);

        // Objet string en session
        sessionStorage.setItem('programing_data',programing_data);
    }

    function UpdatePrixMax(objet,data) {
        //Modification de la donnée
        objet.prix_max = data
        console.log("Nouveau prix max : " + objet.prix_max)


        //Objet en string
        let programing_data = JSON.stringify(objet);

        // Objet string en session
        sessionStorage.setItem('programing_data',programing_data);
    }

    function UpdateNbChambre(objet,data) {
        //Modification de la donnée
        objet.nb_chambre = data
        console.log("Nombre de chambre : " + objet.nb_chambre)

        //Objet en string
        let programing_data = JSON.stringify(objet);

        // Objet string en session
        sessionStorage.setItem('programing_data',programing_data);
    }

    function UpdateNbDouche(objet,data) {
        //Modification de la donnée
        objet.nb_douche = data
        console.log("Nombre de douche : " + objet.nb_douche)

        //Objet en string
        let programing_data = JSON.stringify(objet);

        // Objet string en session
        sessionStorage.setItem('programing_data',programing_data);
    }

    function UpdateCity(objet,data) {
        //Modification de la donnée
        objet.city = data
        console.log("La ville saisie est : " + objet.city)

        //Objet en string
        let programing_data = JSON.stringify(objet);

        // Objet string en session
        sessionStorage.setItem('programing_data',programing_data);
    }

    function UpdateNbEtage(objet,data) {
        //Modification de la donnée
        objet.nb_etage = data
        console.log("Nombre d'etage : " + objet.nb_etage)

        //Objet en string
        let programing_data = JSON.stringify(objet);

        //Objet string en session
        sessionStorage.setItem('programing_data',programing_data);
    }

        //recuperation de la aisie du projet
        $('.get-city').on('input', function() {
            var get_city_value = $(this).val();
            console.log("projet : " + get_city_value)
    
            if(sessionStorage.getItem('programing_data')){
                // Recuperation de la varriable json en session
                let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));
    
                // Modification de donnée : type
                UpdateCity(programing_session_data,get_city_value)
            }
            else{
                CreatJsonVarriable()
                // Recuperation de la varriable json en session
                let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));
    
                // Modification de donnée : type
                UpdateCity(programing_session_data,get_city_value)
            }
        });



    //recuperation du nombre de chambre
    $('.get-bedroom').click(function () {
        document.getElementById('select-bedroom').addEventListener('change', function() {
            var select = document.getElementById('select-bedroom');
            var get_bedroom_value = select.options[select.selectedIndex].value;
            var get_bedroom_text = select.options[select.selectedIndex].text;

            if(sessionStorage.getItem('programing_data')){
                // Recuperation de la varriable json en session
                let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));
    
                // Modification de donnée : type
                UpdateNbChambre(programing_session_data,get_bedroom_value)
            }
            else{
                CreatJsonVarriable()
                // Recuperation de la varriable json en session
                let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));
    
                // Modification de donnée : type
                UpdateNbChambre(programing_session_data,get_bedroom_value)
            }
        });
    });

    //recuperation du nombre de chambre
    $('.get-bathroom').click(function () {
        document.getElementById('select-bathroom').addEventListener('change', function() {
            var select = document.getElementById('select-bathroom');
            var get_bathroom_value = select.options[select.selectedIndex].value;
            var get_bathroom_text = select.options[select.selectedIndex].text;

            if(sessionStorage.getItem('programing_data')){
                // Recuperation de la varriable json en session
                let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));
    
                // Modification de donnée : type
                UpdateNbDouche(programing_session_data,get_bathroom_value)
            }
            else{
                CreatJsonVarriable()
                // Recuperation de la varriable json en session
                let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));
    
                // Modification de donnée : type
                UpdateNbDouche(programing_session_data,get_bathroom_value)
            }

        });
    });

     //recuperation du nombre d'etage
     $('.get-floor').click(function () {
        document.getElementById('select-floor').addEventListener('change', function() {
            var select = document.getElementById('select-floor');
            var get_floor_value = select.options[select.selectedIndex].value;
            var get_floor_text = select.options[select.selectedIndex].text;

            if(sessionStorage.getItem('programing_data')){
                // Recuperation de la varriable json en session
                let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));
    
                // Modification de donnée : type
                UpdateNbEtage(programing_session_data,get_floor_value)
            }
            else{
                CreatJsonVarriable()
                // Recuperation de la varriable json en session
                let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));
    
                // Modification de donnée : type
                UpdateNbEtage(programing_session_data,get_floor_value)
            }
        });
    });

    
     //recuperation de la categorie select-category-text
     $('.get-category').click(function () {
        document.getElementById('select-category').addEventListener('change', function() {
            var select = document.getElementById('select-category');
            var select = document.getElementById('select-category');
            var get_category_value = select.options[select.selectedIndex].value;
            var get_category_text = select.options[select.selectedIndex].text;
            
            if(sessionStorage.getItem('programing_data')){
                // Recuperation de la varriable json en session
                let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));
    
                // Modification de donnée : type
                UpdateCategory(programing_session_data,get_category_value,get_category_text)
            }
            else{
                CreatJsonVarriable()
                // Recuperation de la varriable json en session
                let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));
    
                // Modification de donnée : type
                UpdateCategory(programing_session_data,get_category_value,get_category_text)
            }
        });
    });

    //recuperation de la aisie du projet
    $('.get-project').on('input', function() {
        var get_projet_value = $(this).val();
        console.log("projet : " + get_projet_value)

        if(sessionStorage.getItem('programing_data')){
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdateProject(programing_session_data,get_projet_value)
        }
        else{
            CreatJsonVarriable()
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdateProject(programing_session_data,get_projet_value)
        }
    }); 

    //recuperation de la aisie du prix min
    $('.get-prix-min').on('input', function() {
        var get_min_value = $(this).val();

        if(sessionStorage.getItem('programing_data')){
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdatePrixMin(programing_session_data,get_min_value)
        }
        else{
            CreatJsonVarriable()
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdatePrixMin(programing_session_data,get_min_value)
        }
    }); 

    //recuperation de la aisie du prix max
    $('.get-prix-max').on('input', function() {
        var get_max_value = $(this).val();

        if(sessionStorage.getItem('programing_data')){
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdatePrixMax(programing_session_data,get_max_value)
        }
        else{
            CreatJsonVarriable()
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdatePrixMax(programing_session_data,get_max_value)
        }
    }); 


    //recuperation du clique sur poject
    $('.get-click-on-project').click(function() {
        var get_type_project_value = document.getElementById('get_type_project_value').value;
        var get_type_project_text = document.getElementById('get_type_project_text').value;

        if(sessionStorage.getItem('programing_data')){
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdateType(programing_session_data,get_type_project_value,get_type_project_text)
        }
        else{
            CreatJsonVarriable()
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdateType(programing_session_data,get_type_project_value,get_type_project_text)
        }

    }); 

    //recuperation du clique sur vente
    $('.get-click-on-vente').click ( function() {
        var get_type_vente_value = document.getElementById('get_type_vente_value').value;
        var get_type_vente_text = document.getElementById('get_type_vente_text').value;

        if(sessionStorage.getItem('programing_data')){
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdateType(programing_session_data,get_type_vente_value,get_type_vente_text)
        }
        else{
            CreatJsonVarriable()
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdateType(programing_session_data,get_type_vente_value,get_type_vente_text)
        }
    }); 

    //recuperation du clique sur location
    $('.get-click-on-location').click ( function() {
        var get_type_location_value = document.getElementById('get_type_location_value').value;
        var get_type_location_text = document.getElementById('get_type_location_text').value;
        if(sessionStorage.getItem('programing_data')){
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdateType(programing_session_data,get_type_location_value,get_type_location_text)
        }
        else{
            CreatJsonVarriable()
            // Recuperation de la varriable json en session
            let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

            // Modification de donnée : type
            UpdateType(programing_session_data,get_type_location_value,get_type_location_text)
        }
    }); 
    

    //recuperation de la aisie du prix max
    $('.save-programming-seach').click(function () {

        // Recuperation de la varriable json en session
        let programing_session_data = JSON.parse(sessionStorage.getItem('programing_data'));

        var custumer_id = document.getElementById("user_id").value
        var category_name = programing_session_data.category_text
        var type_value = programing_session_data.type_value
        var type_name = programing_session_data.type_text
        var project = programing_session_data.project
        var min_price = programing_session_data.prix_min
        var max_price = programing_session_data.prix_max
        var number_bedroom = programing_session_data.nb_chambre
        var number_bathroom = programing_session_data.nb_douche
        var number_floor = programing_session_data.nb_etage
        var city_name = programing_session_data.city


        console.log("user_id : " + user_id);
        console.log("categorie : " + programing_session_data.category_value);
        console.log("type : " + programing_session_data.type_value);
        console.log("prix min : " + programing_session_data.prix_min);
        console.log("prix max : " + programing_session_data.prix_max);
        console.log("project : " + project);
        console.log("Douche : " + programing_session_data.nb_douche);
        console.log("chambre : " + programing_session_data.nb_chambre);
        console.log("Etages : " + programing_session_data.nb_etage);
        console.log("cathegory_name : " + programing_session_data.category_text);

        $(".data_container").hide()
        $(".traitement").show()
        $(".save-programming-seach").hide()

        let _token = $('meta[name="csrf-token"]').attr('content');

        request = $.ajax({
            url: "/api/v1/search/programing",
            type: "post",
            data: {
                custumer_id,
                type_name ,
                city_name,
                category_name ,
                min_price ,
                max_price,
                number_bedroom ,
                number_bathroom,
                number_floor,
                _token 
            }
        });

        request.done(function (response, textStatus, jqXHR) { 
            console.log(response)
            $(".traitement").hide()
            $(".save-programming-seach").hide()
            $(".programing_success").show()
            document.getElementById('close').className="btn btn-success";
            sessionStorage.removeItem('programing_data')
        })
    
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "Erreur: " +
            textStatus, errorThrown
          );
        //   sessionStorage.removeItem('programing_data')

        })
    }); 


    //Obtenir les informations du client
    $('.get_custumer_info').click(function () {
    var custumer_id = $(this).parent().find('.custumer_id').attr('id');
    console.log(custumer_id)

    request = $.ajax({
      url: "/secretaireRouteProtected/api/custumer/show/"+ custumer_id,
      type: "get",
      data: {}
    });

    request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        document.getElementById('get_first_name').textContent=response["first_name"];
        document.getElementById('get_last_name').textContent=response["last_name"];
        document.getElementById('get_phone').textContent=response["phone"];
        document.getElementById('get_locality').textContent=response["locality"];
        document.getElementById('get_created_at').textContent=response["created_at"];
    })

    request.fail(function (jqXHR, textStatus, errorThrown) {
      console.error(
        "Erreur: " +
        textStatus, errorThrown
      );
    })
  })

    $(".type_of_compte").click( function (){
        document.getElementById('type-of-compte').addEventListener('change', function() {
            var select = document.getElementById('type-of-compte');
            var get_compte_value = select.options[select.selectedIndex].value;
            console.log(get_compte_value)
            
            if(get_compte_value != ""){
                $(".save_register").show();
                console.log()
            }

            if(get_compte_value == ""){
                $(".save_register").hide();
                console.log()
            }
        });
    });

    $(".save-property").click( function (){
        const name = document.getElementById('type').value
        console.log(name)
    });

    //les menu principales
    $(".main-menu").click( function (){
        const name = document.getElementById('type').value
        console.log(name)
    });


    /* ------------Partie Traitement des project : Recherche Programmée-------------- */
    /* ------------Partie Traitement des project : Recherche Programmée-------------- */
    /* ------------                      PROJET                        -------------- */

    

    //Charger les données
    $('#projectModal').click ( function() {
        let _token = $('meta[name="csrf-token"]').attr('content');
        request = $.ajax({
            url: "/api/v1/project/programing/session",
            type: "get",
            data: {_token}
        });
        request.done(function (response, textStatus, jqXHR) {
            if(response.data != null){
                if(response.category == null){
                    $('.modal_category').hide()
                }
                if(response.data["location"] == null){
                    $('.modal_city').hide()
                }
                if(response.data["min_price" ] == null){
                    $('.modal_min_price').hide()
                }
                if(response.data["max_price" ] == null){
                    $('.modal_max_price').hide()
                }
                if(response.data["keyword"] == null){
                    $('.modal_keys').hide()  
                }
    
                //span
                document.getElementById("modal_category").textContent=response.category;
                document.getElementById("modal_type").textContent="project"
                document.getElementById("modal_min_price").textContent=response.data["min_price"]
                document.getElementById("modal_city").textContent=response.data["location"]
                document.getElementById("modal_max_price").textContent=response.data["max_price"]
                document.getElementById("modal_keys").textContent=response.data["keyword"]
    
                //input
                document.getElementById("type_input").value="projet"
                document.getElementById("city_input").value=response.data["location"]
                document.getElementById("keys_input").value=response.data["keyword"]
                document.getElementById("min_price_input").value=response.data["min_price"]
                document.getElementById("max_price_input").value=response.data["max_price"]
                document.getElementById("category_input").value=response.category;
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

    //Ouvrir le modal sans clique
    $('#projectModal').modal('show').click();

    $('.project-programing-save').click ( function() {
        const type = document.getElementById("type_input").value;
        const city = document.getElementById("city_input").value;
        const category = document.getElementById("category_input").value;
        const keys = document.getElementById("keys_input").value;
        const min_price = document.getElementById("min_price_input").value;
        const max_price = document.getElementById("max_price_input").value;
        console.log("type : " + type)
        console.log("city : " + city)

        $(".data_container").hide()
        $(".traitement").show()
        $(".project-programing-save").hide()

        let _token = $('meta[name="csrf-token"]').attr('content');
        request = $.ajax({
            url: "/api/v1/project/programing/save",
            type: "post",
            data: {type,city,category,keys,min_price,max_price,_token}
        });

        request.done(function (response, textStatus, jqXHR) {            
            $(".traitement").hide()
            $(".save-programming-seach").hide()
            $(".programing_success").show()
        })
    
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error("Erreur: " +textStatus, errorThrown);
        })
    }); 

    /* ------------Partie Traitement des propriétés : Recherche Programmée-------------- */
    /* ------------Partie Traitement des propriétés : Recherche Programmée-------------- */
    /* ------------                      PROPRIETE                        -------------- */

   /*  $('#monModal').click ( function() {
        let _token = $('meta[name="csrf-token"]').attr('content');
        request = $.ajax({
            url: "/api/v1/property/programing/data",
            type: "get",
            data: {_token}
        });
        request.done(function (response, textStatus, jqXHR) {
            console.log("resultat :"+response)
            if(response.data != null){
                if(response.category == null){
                    $('.modal_category').hide()
                }
                if(response.data["type"] == null){
                    $('.modal_type').hide()
                }
                if(response.data["location"] == null){
                    $('.modal_city').hide()
                }
                if(response.data["min_price" ] == null){
                    $('.modal_min_price').hide()
                }
                if(response.data["max_price" ] == null){
                    $('.modal_max_price').hide()
                }
                if(response.data["keyword"] == null){
                    $('.modal_keys').hide()  
                }
                if(response.data["bedroom"] == null){
                    $('.modal_bedroom').hide()  
                }
                if(response.data["bathroom"] == null){
                    $('.modal_bathroom').hide()  
                }
                if(response.data["floor"] == null){
                    $('.modal_floor').hide()  
                }
    
                //span type
                document.getElementById("modal_category").textContent=response.category;
                document.getElementById("modal_type").textContent=response.data["type"]
                document.getElementById("modal_min_price").textContent=response.data["min_price"]
                document.getElementById("modal_max_price").textContent=response.data["max_price"]
                document.getElementById("modal_keys").textContent=response.data["keyword"]
                document.getElementById("modal_bedroom").textContent=response.data["bedroom"]
                document.getElementById("modal_bathroom").textContent=response.data["bathroom"]
                document.getElementById("modal_floor").textContent=response.data["floor"]

                if(response.city != null){
                    document.getElementById("modal_city").textContent=response.city
                    document.getElementById("city_id_input").value=response.city_id;
                }
                else{
                    document.getElementById("modal_city").textContent=response.data["location"]
                }
    
                //input
                document.getElementById("type_input").value=response.data["type"]
                document.getElementById("city_input").value=response.data["location"]
                document.getElementById("keys_input").value=response.data["keyword"]
                document.getElementById("min_price_input").value=response.data["min_price"]
                document.getElementById("max_price_input").value=response.data["max_price"]
                document.getElementById("bedroom_input").value=response.data["bedroom"]
                document.getElementById("bathroom_input").value=response.data["bathroom"]
                document.getElementById("floor_input").value=response.data["floor"]
                document.getElementById("category_id_input").value=response.category_id;

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

    $('#monModal').modal('show').click(); */

    $('.property-programing-save').click ( function() {
        const type = document.getElementById("type_input").value;
        const city = document.getElementById("city_input").value;
        const keys = document.getElementById("keys_input").value;
        const min_price = document.getElementById("min_price_input").value;
        const max_price = document.getElementById("max_price_input").value;
        const bedroom = document.getElementById("bedroom_input").value;
        const bathroom = document.getElementById("bathroom_input").value;
        const floor = document.getElementById("floor_input").value;
        const custumer_id = document.getElementById("user_id_input").value;
        const city_id = document.getElementById("city_id_input").value;
        const category_id =  document.getElementById("category_id_input").value;
        console.log("type : " + type)
        console.log("city : " + city)
        console.log("l'identifiant du client est : " + custumer_id)

        if(type == ""){
            $(".data_container").hide()
            $(".traitement").show()
            $(".property-programing-save").hide()
            document.getElementById("close").className="btn btn-dark btn-close";
            let _token = $('meta[name="csrf-token"]').attr('content');
            request = $.ajax({
                url: "/api/v1/property/programing/save",
                type: "post",
                data: {custumer_id,city_id,category_id,type,city,keys,min_price,max_price,bedroom,bathroom,floor,_token}
            });
    
            request.done(function (response, textStatus, jqXHR) {   
                console.log("reponse :" + response)         
                $(".traitement").hide()
                $(".save-programming-seach").hide()
                $(".programing_success").show()
                document.getElementById("close").className="btn btn-success btn-close";
            })
        
            request.fail(function (jqXHR, textStatus, errorThrown) {
              console.error("Erreur: " +textStatus, errorThrown);
            })
        }
        else{
            alert("Le type de propriété n'est pas precisé :Acceder a l'acceuil est selectionner le type de propriété recherché")
        }
        
    }); 

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
                url: "/api/v1/account/agent/request",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
            });
    
            request.done(function (response, textStatus, jqXHR) {   
                console.log("response"+response)         
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
            url: "/api/v1/property/programing/data",
            type: "get",
            data: {_token}
        });
        request.done(function (response, textStatus, jqXHR) {
            console.log("resultat :"+response)
            if(response.data != null){
                if(response.category == null){
                    $('.withclick_modal_category').hide()
                }
                if(response.data["location"] == null){
                    $('.withclick_modal_city').hide()
                }
                if(response.data["type"] == null){
                    $('.withclick_modal_type').hide()
                }
                if(response.data["min_price" ] == null){
                    $('.withclick_modal_min_price').hide()
                }
                if(response.data["max_price" ] == null){
                    $('.withclick_modal_max_price').hide()
                }
                if(response.data["keyword"] == null){
                    $('.withclick_modal_keys').hide()  
                }
                if(response.data["bedroom"] == null){
                    $('.withclick_modal_bedroom').hide()  
                }
                if(response.data["bathroom"] == null){
                    $('.withclick_modal_bathroom').hide()  
                }
                if(response.data["floor"] == null){
                    $('.withclick_modal_floor').hide()  
                }
    
                //span type
                document.getElementById("withclick_modal_category").textContent=response.category;
                document.getElementById("withclick_modal_type").textContent=response.data["type"]
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
                document.getElementById("withclick_keys_input").value=response.data["keyword"]
                document.getElementById("withclick_min_price_input").value=response.data["min_price"]
                document.getElementById("withclick_max_price_input").value=response.data["max_price"]
                document.getElementById("withclick_bedroom_input").value=response.data["bedroom"]
                document.getElementById("withclick_bathroom_input").value=response.data["bathroom"]
                document.getElementById("withclick_floor_input").value=response.data["floor"]
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
        const custumer_id = document.getElementById("withclick_user_id_input").value;
        const city_id = document.getElementById("withclick_city_id_input").value;
        const category_id =  document.getElementById("withclick_category_id_input").value;
        console.log("type : " + type)
        console.log("city : " + city)
        console.log("l'identifiant du client est : " + custumer_id)

        if(type ==""){
            $(".withclick_data_container").hide()
            $(".withclick_traitement").show()
            $(".withclick-property-programing-save").hide()
            $(".withclick-programing-btn").hide()
            $(".withclick-programing-btn").show()
    
            document.getElementById("close").className="btn btn-dark btn-close";
            let _token = $('meta[name="csrf-token"]').attr('content');
            request = $.ajax({
                url: "/api/v1/property/programing/save",
                type: "post",
                data: {custumer_id,city_id,category_id,type,city,keys,min_price,max_price,bedroom,bathroom,floor,_token}
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
});