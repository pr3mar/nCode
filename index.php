<!doctype html>
<html>
	<head>
	<?php 
	define('TITLE','nCode::Скриј ја твојата порака!');
	require_once('templates/header.php'); ?>
	<script>
		$(function() {
			$('#tuka').click( function (){
				$('#kod').css("display","block");
			});
			$( "#tabs_1" ).tabs({
				beforeLoad: function( event, ui ) {
					ui.jqXHR.error(function() {
					ui.panel.html(
						"Грешка во вчитувањето, ве молам пробајте повторно.");
					});
				}
			});
			$( "#tabs_2" ).tabs({
				load: function( event, ui ) {
					 SyntaxHighlighter.all();
				},
				beforeLoad: function( event, ui ) {
					ui.jqXHR.error(function() {
					ui.panel.html(
						"Грешка во вчитувањето, ве молам пробајте повторно.");
					});
				}
			});
		});
	</script>
	</head>

	<body id="home">
    <div id="container"> 
      <!-- START header -->
      <?php require_once('templates/navMenu.php');echo "\n";?>
      <!-- END header --> 
      
      <!-- START main_content -->
      <div id="content_wrapper">
        <cont id="cHome">
          <h1> Добродојдовте на nCode </h1>
          <p><b>nCode</b> е интернет алатка која служи за истражување, упатување и експериментирање со криптографијата, која е една од најзастапените науки на денешницата, но многу луѓе не се свесни за тоа.</p>
          <a href="imgs/grupa.jpg" rel="lightbox"><img src="imgs/grupa_thumb.jpg" style="float:right" width="351" height="351"></a>
          <h2> Што е тоа криптографија? </h2>
          <p>Доаѓајќи од грчките зборови  криптос-скриено, тајно и графос-пишување, зборот крипторафија ни ја претставува вештината на сокривање на пораките кои содржат ранливи информации.</p>
          <img src="imgs/sherlock.jpg" width="150" height="189">
          <p>Криптографијата е наука којашто се појавува низ историјата заедно со математиката, со физиката, со филозофијата, со логиката. Таа е наука која ја користи математиката за да состави начин на прикривање, маскирање на пораката која сака да ја чува во тајност.</p>
          <p>Низ историјата се сретнуваат  разни облици на криптографија. Врз основа на достигнувањата  во криптографијата, можеме да забележиме како и колку човечкиот интелект се развивал.</p>
          <p>Криптографијата е наука којашто е многу користена во денешницата, иако многу луѓе не се свесни за тоа. Ја среќаваме во наједноставните апликации каде што е потребна автентикација на корисниците, во телекомуникациите, во банкарството, во докажувањето  на идентитетот  како и на многу други места.</p>
        </cont>
        <cont id="cOver" style="display:none">
          <p> Научете нешто повеќе за криптографијата </p>
          <div id="tabs_1">
            <ul>
              <li><a href="texts/poim.html">Поим</a></li>
              <li><a href="texts/recnik.html">Речник</a></li>
              <li><a href="texts/funkcionira.html">Функционирање</a></li>
              <li><a href="texts/vid.html">Видови</a></li>
              <li><a href="texts/simetricna.html">Симетрична</a></li>
              <li><a href="texts/primena.html">Примена</a></li>
              <li><a href="texts/zaklucok.html">Заклучок</a></li>
            </ul>
          </div>
        </cont>
        <cont id="cObjas" style="display:none">
          <p>Објаснувања</p>
          <div id="tabs_2">
            <ul>
              <li><a href="texts/about.html">За nCode</a></li>
              <li><a href="texts/cezarova_sifra.html" id="tuka">Цезарова шифра</a></li>
              <li><a href="texts/matrici_4.html">Метод на 4 матрици</a></li>
            </ul>
          </div>
        </cont>
        <cont id="cEncrypt" style="display:none">
          <h2>Скриј ја својата порака</h2>
          <select id="encode">
            <option value="0"> одбери метод</option>
            <option value="1"> цезарова шифра</option>
            <option value="2"> метод на 4 матрици</option>
          </select>
          <div id="en_caesar" style="display:none;">
            <fieldset>
              <table>
              	<tr> 
                	<td><label for="en_rotate">Поместување:</label></td> 
                    <td><input type="text" id="en_rotate" required/></td>
                </tr>
                <tr>
                  <td><label for="en_caes_plain">Текст за кодирање</label></td>
                  <td><label for="en_caes_ciph">Кодиран текст</label></td>
                </tr>
                <tr>
                  <td><textarea id="en_caes_plain"></textarea></td>
                  <td><textarea id="en_caes_ciph"></textarea></td>
                </tr>
              </table>
            </fieldset>
          </div>
          <div id="en_fmatrix" style="display:none;">
            <fieldset>
              <table>
                <tr>
                  <td><label>Клучен збор:</label></td>
                  <td><input type="text" id="en_keyword1" required/></td>
                </tr>
                <tr>
                  <td><label>Клучен збор:</label></td>
                  <td><input type="text" id="en_keyword2" required/></td>
                </tr>
                <tr>
                  <td><label for="en_fmat_plain">Текст за кодирање</label></td>
                  <td><label for="en_fmat_ciph">Кодиран текст</label></td>
                </tr>
                <tr>
                  <td><textarea id="en_fmat_plain"></textarea></td>
                  <td><textarea id="en_fmat_ciph"></textarea></td>
                </tr>
              </table>
            </fieldset>
          </div>
        </cont>
        <cont id="cDecrypt" style="display:none">
          <h2>Пробиј ја својата порака:</h2>
          <select id="decode">
            <option value="0"> одбери метод</option>
            <option value="1"> цезарова шифра</option>
            <option value="2"> метод на 4 матрици</option>
          </select>
          <div id="de_caesar" style="display:none;">
            <fieldset>
              <table>
	            <tr> 
                	<td><label for="de_rotate">Поместување:</label></td> 
                    <td><input type="text" id="de_rotate" required/></td>
                </tr>
                <tr>
                  <td><label for="de_caes_ciph">Текст за пробивање</label></td>
                  <td><label for="de_caes_plain">Чист текст</label></td>
                </tr>
                <tr>
                  <td><textarea id="de_caes_ciph"></textarea></td>
                  <td><textarea id="de_caes_plain"></textarea></td>
                </tr>
              </table>
            </fieldset>
          </div>
          <div id="de_fmatrix" style="display:none;">
            <fieldset>
              <table>
                <tr>
                  <td><label>Клучен збор:</label></td>
                  <td><input type="text" id="de_keyword1" required/></td>
                </tr>
                <tr>
                  <td><label>Клучен збор:</label></td>
                  <td><input type="text" id="de_keyword2" required/></td>
                </tr>
                <tr>
                  <td><label for="de_fmat_ciph">Текст за пробивање</label></td>
                  <td><label for="de_fmat_plain">Чист текст</label></td>
                </tr>
                <tr>
                  <td><textarea id="de_fmat_ciph"></textarea></td>
                  <td><textarea id="de_fmat_plain"></textarea></td>
                </tr>
              </table>
            </fieldset>
          </div>
        </cont>
        <script src="scripts/form_handler.js"></script>
        <cont id="cContact" style="display:none">
          <h1> Контактирај ме! </h1>
          <p>Доколку имате некој проблем или сакате да ме исконтактирате, тогаш пишете ми <a href="mailto:markoprelevik@gmail.com">тука</a> </p>
        </cont>
      </div>
      <!-- END main_content --> 
      
      <!-- START footer -->
      <?php require_once('templates/footer.php'); ?>
      <!-- END footer --> 
    </div>
</body>
</html>