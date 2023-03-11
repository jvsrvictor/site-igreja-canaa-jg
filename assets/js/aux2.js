const form = document.getElementById('cadastro_culto_form');
				form.addEventListener('submit', function (e) {
					e.preventDefault();
					var http = new XMLHttpRequest();
					var proxy = 'https://cors-anywhere.herokuapp.com/';
					var url = '//canaajdguanabara.ga/assets/php/cadastro_culto';
					var params = new FormData(form);
					if($('#nome_cadastro').val()==''){
						vex.dialog.alert({
							message: 'Preencha com seu nome completo!',
							className: 'vex-theme-wireframe'
						})
					}else{
						
						http.open('POST', url, true);

						http.onreadystatechange = function () {
							console.log(http.responseText);
							if (http.readyState == 4 && http.status == 200) {
								if (http.responseText == '1') {
									vex.dialog.alert({
										message: 'Cadastro realizado com sucesso!',
										className: 'vex-theme-wireframe'
									})
								}
								
								if(http.responseText == '0'){
									vex.dialog.alert({
										message: 'Impossível Cadastrar, vagas insuficientes!',
										className: 'vex-theme-wireframe'
									})
								}

								if(http.responseText == '4'){
									vex.dialog.alert({
										message: 'Nome já cadastrado!',
										className: 'vex-theme-wireframe'
									})
								}
							}
						}
						http.send(params);
					}
					
				});