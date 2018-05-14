$(function(){
                
                var top = 180;
                
                function size(){
                    top = 180;
                    if(parseInt($('body').css('width')) < 1175)
                        top = 0;
                }
                size();
                $( window ).resize(function() {
                    
                    size();
                });
                
                //Au scroll dans la fenetre on déclenche la fonction
                $(window).scroll(function () {
                    //si on a défilé de plus de 180px du haut vers le bas
                    if ($(this).scrollTop() > top) { 
                        //on ajoute la classe "blanc" au header
                        $('header').addClass('blanc');
                        $('body').addClass('saut');
                        $('.ainsta').attr('src', 'http://www.revue-bancal.fr/wp-content/themes/rbancal/images/instagram-noir.png' );
                        $('.afacebook').attr('src', 'http://www.revue-bancal.fr/wp-content/themes/rbancal/images/facebook-noir.png' );
                        $('.atwitter').attr('src', 'http://www.revue-bancal.fr/wp-content/themes/rbancal/images/twitter-noir.png' );
                        $('.arecherche').attr('src', 'http://www.revue-bancal.fr/wp-content/themes/rbancal/images/rechercher-noir.png' );
                        $('#searchsubmit').attr('style', 'background-image: url(http://www.revue-bancal.fr/wp-content/themes/rbancal/images/rechercher-noir.png); background-color: #fff' );
                    } else {
                        //sinon on retire la classe "blanc" (c'est pour laisser le header à son endroit de départ lors de la remontée
                        $('header').removeClass('blanc');
                        $('body').removeClass('saut');
                        $('header ul').removeClass('open');
                        $('header form').removeClass('open');
                        $('.burger').removeClass('croix');
                        $('.ainsta').attr('src', 'http://www.revue-bancal.fr/wp-content/themes/rbancal/images/instagram.png' );
                        $('.afacebook').attr('src', 'http://www.revue-bancal.fr/wp-content/themes/rbancal/images/facebook.png' );
                        $('.atwitter').attr('src', 'http://www.revue-bancal.fr/wp-content/themes/rbancal/images/twitter.png' );
                        $('.arecherche').attr('src', 'http://www.revue-bancal.fr/wp-content/themes/rbancal/images/rechercher.png' );
                        $('#searchsubmit').attr('style', 'background-image: url(http://www.revue-bancal.fr/wp-content/themes/rbancal/images/rechercher.png); background-color: #0f0f0f' );
                    }
                    //on annule le comportement du lien
                return false;
                });
                
                $('#recherche').click(function(){
                    if($('.rechercher').hasClass('cache')){
                        
                        $('.rechercher').removeClass('cache');
                        $('.rechercher').addClass('visible');
                        
                        $('#recherche').removeClass('visible');
                        $('#recherche').addClass('cache');

                        $('.valider').removeClass('cache');
                        $('.valider').addClass('visible');  
                    };
                return false;
                }); 
                
                $(".pagination").on("click", "a", function(e){
                    //e.preventDefault() && e.stopPropagation();
                    $('form input#page').val($(this).data('page'));
                    $('form input#page').closest('form').submit();
                })
                
                $('.burger').click(function(){
				    $('header ul').toggleClass('open');
                    $('header form').toggleClass('open');
                    if($('.burger').hasClass('croix')){
                       $('.burger').removeClass('croix');
                    }else{
                        $('.burger').addClass('croix');
                    }
                    
                })


                $('.pad-droite').click(function(){
                    $('.pad-droite').css('color', "#404040");
                    $('.pad-droite').css('border', "none");
                    $(this).css("border","1px solid #404040");
                });



                $(".current").parents('li').css("background-color", "#c3c3c3");


            });