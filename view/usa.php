<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>The Americas</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../public/style/accueil.css">
    <link rel="stylesheet" href="../public/style/style.css">
    <link rel="stylesheet" href="../public/style/styleC.css">
</head>
<body id=bdj>
    <?php require("enteteCon.php"); ?>   
    
    <!-- section de la carte du monde -->
    <div id="maCarte" style="height:70%"> </div>
      
  
    <!-- section du questionnaire -->
    <div class="qst text-center">
        <h2>La question est la suivante : </h2>
        <div class="text-center">
            <h4>Trouver l'emplacement du pays représenté par ce drapeau sur la carte ci-dessus </h4>
                <!-- section des drapeaux -->
            <img id="drp" src=" " width="100px" hight="100px" float="rigth"/> 
            <!--<h2 id="drp"> kik</h2>-->
        </div>
        <div class="text-center">
            <h3 id="score">0</h3> 
            <hr>
            <h3 id="bravo"></h3>
        </div>
        <div class="row">
            <div class="col">
                <p id="resume" ></p>
            </div>
            <div class="col">
                <img id="pht" src=" " width="400px" height="370px">  
            </div>
        </div>
            
    </div>

    <!-- boutons -->
    <div>
        <div class="d-flex justify-content-between mb-3" style="margin:100px 100px">
            <div class="p-2 "><span id="compteur" class="rounded-circle btn-primary btn-lg">0/10</span></div>
            <div class="p-2"><a style="broder-raduis: 20px;" href="usa.php" class="btn btn-primary btn-lg" >Rejoueur</a></div>
            <div class="p-2">
                <button type="button" class="btn btn-primary btn-lg">Question suivante</button></div>
            </div>

            </div>
        </div>
        <div class="justify-content-between text-center"><a style="broder-raduis: 20px;" href="main.php" class="btn btn-primary btn-lg" >Quitter</a></div>

    </div>
    
    
    <?php require("footer.php"); ?>

<script>
        
        //Initialisation et affichage de la carte.
        var carte = L.map('maCarte').setView(
            [13.92340,-98.43750] , 2);
        var coucheStamenWatercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}',{
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            ext: 'jpg'
        }).addTo(carte);

        // changement de la forme du curseur en pointeur
        document.getElementById('maCarte').style.cursor = 'pointer';

         //--------------------------------
         // fonctions pour tracer les pays du monde
         var countriesLayer;
			function highlightFeature(e){
				var layer = e.target;
				layer.setStyle(
					{   fillColor : 'blue',
						weight : 2,
						color : 'blue',
						dashArray :1
					}
				);
				if(!L.Browser.ie && !L.Browser.opera){
					layer.bringToFront();
				}
			}
			
			function resetHighlight(e){
				countriesLayer.resetStyle(e.target);
			}
			
			function zoomToFeature(e){
				carte.fitBounds(e.target.getBounds());
			}
			
			function countriesOnEachFeature(feature, layer){
				layer.on(
					{
						mouseover : highlightFeature,
						mouseout : resetHighlight,
						dblclick : zoomToFeature
					}
				);
			}
			
			function countriesStyle(feature){
				return {
					fillColor : 'red',
					weight : 1,
					opacity : 1,
					color : 'white',
					dashArray : 1
				}
			}
			
				$.ajax({
					url:"../model/countries.geojson",
					dataType:"json",
						success: function (data) {
							countriesLayer = L.geoJson(data,
                  			      {style : countriesStyle,
                                        onEachFeature : countriesOnEachFeature
                        	}).addTo(carte);
                               
						},
						error: function (err) {
							alert("j'ai echoué ");
						},		
				});

        //--------------------------------

        $(".p-2 > a").hide(); // pour masquer les bouttons Rejouer et Quitter la partie.
        $("#pht").hide();
        var index = 0;
        var compteur = Boolean(1);
        var popup = L.popup();
        var circle;
        var pol;
        var correct;
        var tab = new Array();
        var p;
        var nbrQuestionCorrect = 0;
        var num_quest = 1;
        $.ajax({
           url: "drapeauxAmerique.json",
           dataType: "json",
           success: function(data){
                my=data;
                console.log(my);
               traitement(data,index);
           },
           error: function(){
               alert("ERREUR !!!");
           }
        });
        $("button").click(function (){
            var num_quest = 1;
            index = index + 1;
            if(index == 9){
                $("button").hide();
                $(".p-2 > a").show();
            } 
            compteur = Boolean(1);
            $("#pht").hide();
            $("#resume").html(" ");
            $("#bravo").html(" ");
            deleteTab();
            if (p != null) {
                carte.removeLayer(p);
            }
            $.ajax({
                url: "drapeauxAmerique.json",
                dataType: "json",

                success: function (data) {
                    my=data;
                    console.log(my);
                    traitement(data, index);
                },
                error: function (erreur) {
                    alert("ERREUR !!! ");
                },
            });
        });
       
        function traitement(data, index){
            //polygone(data[0].features[index].proprietes.pays.polygone);
            flag(data[0].features[index].drp);
        } 
        // la fonction qui va délimiter une zone sur la carte
        function polygone(lien) {
            $.getJSON(lien, function (data) {
                p = L.geoJSON(data, {
                style: function (feature) {
                return { color: 'blue',
                    fillColor : 'blue',
                    fillOpacity : 0.1 };
                }
            }).addTo(carte);
            carte.fitBounds(p.getBounds());
            });
        }
         // la fonction qui va afficher les drapeaux 
        function flag(lien){
            $("#drp").attr("src" , lien);
        }
       
        // la fonction qui change la carte apres avoir cliquer sur le bouton ' la question suivante'
        function deleteTab() {
            var i = 0;
            while (i < tab.length) {
            tab.pop().remove();
            i++;
            }
        }


        function onMapClick(e){

            $.ajax({
		    type: 'GET',
		    url: "https://nominatim.openstreetmap.org/reverse",
		    dataType: 'jsonp',
		    jsonpCallback: 'data',
		    data: { format: "json", lat: e.latlng.lat,lon: e.latlng.lng,json_callback: 'data' },
		    error: function(xhr, status, error) {
				alert("ERREUR "+error);
			},
		    success: function(data){
                console.log(data);
				if (data.address.country == my[0].features[index].proprietes.pays.name){
					$.getJSON(my[0].features[index].proprietes.pays.polygone, function (data) {
						p = L.geoJSON(data, {
						style: function (feature) {
							return { color: 'green',
								fillColor : 'green' };
						}
						}).addTo(carte);
						
    				});
					nbrQuestionCorrect++;
                	$("#compteur").html(nbrQuestionCorrect+'/10 ');
					var res = $("#score").text();
					var num = Number(res);
					$("#score").html(num + 1000);	
					$("#pht").attr("src", my[0].features[index].proprietes.pays.photo);
					$("#pht").show();
					
					$("#resume").html(my[0].features[index].proprietes.pays.resume);
					$("#bravo").html("Bien jouer ! Vous l'avez trouvé.");
                    $("#bravo").css("color", "black");
                    $("#bravo").css("background-color", "rgb(83, 223, 83)");
                    $("#bravo").css("margin-left","450px")
                    $("#bravo").css("margin-right","450px")
                    $("p").css("font-size","20px");
				}else{
					$.getJSON(my[0].features[index].proprietes.pays.polygone, function (data) {
						p = L.geoJSON(data, {
						style: function (feature) {
							return { color: 'green',
								fillColor : 'green' };
						}
						}).addTo(carte);
					
    				});
					$("#score").text(res);
					$("#pht").attr("src", my[0].features[index].proprietes.pays.photo);
					$("#pht").show();
					$("#resume").html(my[0].features[index].proprietes.pays.resume);
					$("#bravo").html("Oups ! C'est pas le bon emplacement.");
				    $("p").css("font-size","20px");
                    $("#bravo").css("color", "black");
                    $("#bravo").css("background-color", "rgb(221, 48, 48)");
                    $("#bravo").css("margin-left","450px")
                    $("#bravo").css("margin-right","450px")
                           
                }
				
				
			
			}	
		});
        }
        carte.on('click', onMapClick);
</script>