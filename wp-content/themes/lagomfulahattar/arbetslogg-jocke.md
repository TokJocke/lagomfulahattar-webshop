2/5 

Skapat footer.php, functions.php, header.php, index.php, navbar.php, parallax.php och style.css.
Börjat grovt skapa layouten för framsidan och pusslar ihop bitarna med "<?php get_template_part('my-templates'); ?>"
Bråkat en del med css som inte ville som jag. Men godkänt resultat på slutet av dagen.
skapat en navbar i en egen php fil som också hämtas med get_template till index. När css är precis som jag vill ha det ska parallaxen flyttas till sin 
egna php fil också. Har dessutom lagt till visa funktioner i functions.php så som:

"remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );"

och funktioner för att ladda script och style dokument. 


3/5 

grundlayout klar, lagt till funktioner för att hämta widgets i custom post type: parallax.
lagt till custom post type parallax och skapat content där som hämtas med loopen i parallax.php.
Lagt till widgets för logo och searchbar och stylat dessa. Mycket css, blandannat skapat animationer för nav menyn.
Färdigställt navbaren med önskad html struktur i navbar.php. 
La en timme på kvällen för att finslipa parallaxen och content där i. Nestade divar för layout syfte. Nöjd med resultat. 

4/5 

lagt till fler widgets och hookar för dessa. Letat efter hook för products widget utan resultat. Behöver hitta hook där jag kan placera "lägg till i varukorg" knapp
och möjligtvis någon form av "rea" sticker. Jakten fortsätter.. 
Ännu mer css jobb och flexbox bråk, verkar fungera som intended just nu. Bytt ut logga mot en med mindre whitespace, tackar robban för loggan. 
Läst på lite om alternativ till widgets för att visa rea produkter, Kan vara smidigare att använda plugin. Får se vad morgondagen erbjuder. 
Funderat på skillnaden mellan sale/discount utan breakthrue. Får se hur detta ska användas. 

5/5

Var på akuten så fick inte så mycket gjort som jag hade önskat. Fixade dock till widgets och ändrade vissa utav dem från widgets till blocks. Och fixade stylingen
på blocken. La till "Sale" sticker och stylade och placerade utefter önskemål. Stylade dessutom "add to cart" knapp. La till fler blocks utefter krav specifikation och index
är snart klar. 



6/5

Fixade JS för transform för våran pil som visar att man kan scrolla i våra "paraBox" divvar. Om sista children i diven syns transformas pilen och pekar uppåt.
Om den 4 från botten syns ändras pilen tillbaka. Började utforma footer som placeras med hjälp av wp_footer. La till loga i footer genom hook. Gruppen svärmade när vi 
mergade vår senaste version till live server. Svärmade också buggfix och strukturering av css filer.


7/5 

Jobbade med "En puff för det senaste inlägget från bloggen" och Ett bildspel som presenterar aktuella kampanjer. Skapade en JS funktion som "känner av" i vilka divvar scroll pilen
behöver skapas. Laddade ner en plugin för att skapa mer avancerade coupons, och skapade en egen php fil med en funktion som skriver ut alla kuponger och dess innehåll från DB
skapade sen en shortcode och widget för att skriva ut denna. Är dock inte nöjd med resultat utan ska försöka lösa uppgiften med en kategori istället för att kunna
skapa ett bild spel. 

10/5

Letat plugins, och bråkat med dessa. Felsökte en plugin som ändrade inställningar som bestod trots att plugin avinstallerades. Fick det att fungera tillslut efter
mycket om och men med blandannat en ominstallation av DB. Har tillslut hittat två plugins som fyller behovet. En för slideshow, än för special pricing. 
Vi har svärmat en del om blandade problem.

11/5

Fixade load_styles_and_scripts() funktion som laddar olika script och css utefter vilken sida man är på. Fixade med pluggins och gjorde widgetareas utav footern. 
Dessutom massa små pill.

12/5

Förfinar all css och slutför så att allt är redo för inläming. Skapade ny dropdown nav för mindre skärmar som är hidden på större skärmar med mera!


