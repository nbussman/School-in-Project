<?
include("header.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);

  include("mysql_connect.php");

  $name = mysqli_real_escape_string($db, ($_POST["name"]);
  $teilnehmeranzahl = $_POST["teilnehmeranzahl"];
  if (!is_numeric($teilnehmeranzahl))  exit();

  if((!$name =="") && ($teilnehmeranzahl > 0)){
    $query = "INSERT INTO instanz (teilnehmeranzahl, bogenname) VALUES ( '".$teilnehmeranzahl."', '".$name."')";
    $eintragen = mysqli_query($db, $query);
  }
  $bodenId = mysqli_insert_id($db);


  if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
      $protocol = 'http://';
  } else {
      $protocol = 'https://';
  }
  $base_url = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) ."/login.php?pid=".$bodenId;

  for ($i = 1; $i <= 100; $i++) {
    $pname = $_POST["pName".$i];
    $pbeschreibung = $_POST["pbeschreibung".$i];
    $panzahl = $_POST["panzahl".$i];
    if( !($pname == "") || ($panzahl > 0) ) {
      $query = sprintf("INSERT INTO projekte (pid, name, beschreibung, maxAnzahl) VALUES ( '%s', '%s', '%s', '%s')",
        $bodenId,
        mysqli_real_escape_string($db, ($pname),
        mysqli_real_escape_string($db, ($pbeschreibung),
        mysqli_real_escape_string($db, ($panzahl)
      );
      $eintragen = mysqli_query($db, $query);
    }
  }
  ?>
    <br>
    <div class="jumbotron noprint">
      <h1>Liste erstellt</h1>
      <p>Es wurde eine Liste mit Phantasienamen erstellt. Bitte drucken Sie die Liste aus und verteilen die Namen an die Schülerinnen und Schüler.<br>
      Der Phantasiename fungiert hier als Anmeldekennung zur Projektanwahl. Die Schülerinnen und Schüler müssen Erst-, Zweit- und Drittwahlangeben. Bitte aktualisieren Sie diese Seite nicht - sonst wird ein neuer Anwahlbogen generiert. </p>
      <button type="button" class="btn btn-default btn-lg" onClick="window.print();return false">Liste drucken</button>
    </div>
  <?

  //Phantasienamen
  $namen = array("Taen","Thoraen","Emsa","Tholauen","Phegaen","Teiel","Geen","Othlael","Maluen","Arlua","Manauen","Mael","Phelua","Bolas","Solaa","Reanlas","Efgaen","Didmil","Mirdriel","Boluil","Krair","Othsa","Lidil","Fauen","Reilaa","Neuen","Efgamil","Alden","Bowen","Faeluwen","Faedomil","Emiel","Nemosa","Tagauen","Liuen","Bodoa","Nemen","Nema","Faanlas","Fea","Berdomil","Renawen","Taen","Faedren","Linlas","Relael","Enuen","Fendouen","Feramil","Thoel","Ardanwen","Boromir","saphirell","eisenfreund","etegosch","mergrimial","morax","aquie","gruben","huramesch","briannia","minenhueter","gemgrasch","giraschi","kohlenspur","hemu","blunicya","hutgestein","kowem","perinnie","erzfreund","gurtheg","zunilkie","eisenhueter","kargam","opalall","goldherr","kubex","segalnia","donnerruf","halmer","ardenia","isenfest","xesch","sagrima","erzgier","alwas","legria","eisenglanz","merux","nenya","streb","zemkhal","wapargell","donnerstimme","lagoraschd","breandrea","berggericht","miged","vialya","schelle","muragesch","naraschya","eisenhauer","rabogasch","tirzelea","steingut","emgresch","damirall","isenfreund","rabugasch","fanlika","felsenformer","berlax","lesell","dugro","eisenschlag","ceany","tummelbau","merux","aquamarini","spaten","gelgar","brianny","bergvogt","pegolesch","giraschya","schram","elberech","nartgreme","querschlaeger","thoram","gillya","goldschmuck","thorum","nary","stoesser","utick","perinnial","kieselgur","feriagea","doerres","bilber","eichlall","plueckebaum","milan","milial","maldhaeufel","byler","peregrell","fassbender","adelal","smealall","zanizer","gorbadig","boffal","sauerbrei","loghot","drogi","zibur","gildan","primie","zieglers","sancham","bellal","zander","idig","mersadell","zinck","folko","gildya","zermar","hugar","merrya","vocker","logham","othall","lochner","tobber","samwea","zils","seregreis","bilbya","hasenclever","larar","mervinall","blaue","fredor","hibbal","zievel","huger","loghell","ehrbach","rorigal","perdya","zoettger","gorbady","sanchy","zemmler","feriagas","lobelell","schwarz","beller","merge","kemnadis","idim","milvia","kleefuss","timad","pedinal","merdok","hibbo","deagia","loghir","peregrea","uemmingen","times","bary","zihner","merol","meriadial","ehrbach","smealad","seregrial","prigge","lariat","blenda","ziebarth","marles","paenal","blumenschatz","dicentrie","wiesenmagie","gerania","glockentanz","primelea","wunderschoen","lavenea","zauberkuss","hesperall","bluetenschoen","monardall","bluetenwohl","tiarelle","federglanz","begonya","sternenblume","amoral","weidenzart","yasminya","lichterwohl","narzissell","mondenblume","lupineie","federtracht","rubine","gloeckchenflug","chrysanthema","goldtracht","jadial","wiesentau","orchise","goldschein","astrami","morgentau","gentianal","blumentanz","phloxell","feenduft","kastanell","gloeckchenkind","petuna","glockenbraut","begony","himmelsklang","leona","bluetenfrucht","eibal","bluetenkind","narzissea","glockenbluete","veroni","traumkraut","florie","himmelsstaub","annemoni","wiesentanz","jadia","bluetensuess","Chef","Hatschi","Happy","Schlafmuetz","Brummbaer","Pimple","Sepple","Schneeweisschen","Rosenrot","Scheewittchen","Rapunzel","Haensel","Gretel","Aschenputtel","Froschkoenig","Cinderella","Elsebill","Rumpelstilzchen","Kaspar","Melchior","Balthasar","Rippenbiest","Hammelswade","Schnuerbein","Kunz","Undine","Prinz","Prinzessin","Dornroeschen","Dummling","Jorinde","Joringel","Alibaba","Aladin","Sindbad","Scheherazade","Seppl","Arielle","Bruederchen","Schwesterchen","Frauholle","Rotkaeppchen","Fundevogel","Acheron","Adonis","Aiolos","Alekto","Amphitrite","Aphrodite","Apollon","Artemis","Asklepios","Athene","Atropos","Boreas","Chariten","Chloris","Chronos","Demeter","Doris","Eos","Erebos","Erinnyen","Eris","Eros","Gaia","Ganymedes","Glaukos","Hades","Harmonia","Hebe","Hekate","Helios","Hera","Herakles","Hermes","Hestia","Hyperion","Horen","Hymenaios","Hypnos","Iris","Kerberos","Klotho","Kratos","Kronos","Kybele","Lachesis","Megaira","Metis","Moiren","Morpheus","Nemesis","Nereiden","Nereus","Nike","Olymp","Palaimon","Pan","Peitho","Persephone","Phoibe","Phorkys","Pontos","Poseidon","Priapos","Rhea","Selene","Silenos","Styx","Tethys","Thanatos","Thaumas","Themis","Tisiphone","Triton","Tyche","Uranos","Zeus","Abundantia","Aequitas","Aesculap","Aeternitas","Amor","Annona","Aurora","Bacchus","Carna","Ceres","Clementia","Concordia","Cyele","Diana","Fecunditas","Felicitas","Fides","Flora","Fortuna","Furrina","Genius","Hercules","Hilaritas","Honor","Indulgentia","Janus","Juno","Jupiter","Justitia","Juventas","Laetitia","Laren","Laverna","Levana","Liberalites","Libertas","Luna","Mars","Mercurius","Minerva","Moneta","Neptunus","Nobilitas","Ops","Pax","Penaten","Pietas","Plutos","Portunus","Providentia","Proserpina","Pudicita","Roma","Salus","Saturnus","Securitas","Somnus","Sol","Spes","Tellus","Tranquilittas","Uberitas","Venus","Vesta","Virtus","Vulcanus","Ammit","Amun","Anat","Anubis","Anuret","Apophis","Astarte","Aton","Atum","Bastet","Bes","Buto","Chepre","Chnum","Chons","Geb","Hapi","Haroeris","Hathor","Horus","Ihi","Imothep","Isis","Maat","Mahes","Merserger","Meschenet","Min","Mut","Nechbet","Nefertem","Nehemet","Neith","Nephthys","Nun","Nut","Osiris","Ptah","Re","Renenutet","Reschef","Satis","Sechmet","Selket","Seth","Shu","Sobek","Tabitjet","Tatenen","Tefnut","Thot","Edda","Aurvandill","Balder","Bragi","Eggther","Fjoelnir","Fjoergyn","Forseti","Freya","Frigg","Fulla","Gautr","Gefjon","Gerda","Gna","Heimdall","Hel","Hermodr","Hoedur","Hoenir","Idun","Joerd","Lofn","Loki","Magni","Modi","Mani","Mimir","Nanna","Njoerd","Nott","Odin","Ran","Rindr","Sif","Sigyn","Skadi","Snotra","Surt","Tyr","Thor","Uller","Urd","Wali","Ve","Vidar","Vili","Yngvi","aegir","Balderus","Bous","Frigga","Fro","Gevarus","Hotherus","Horvendillus","Mimingus","Mithot","Madonna","Bisasam","Bisaknosp","Bisaflor","Glumanda","Glutexo","Glurak","Schiggy","Schillok","Turtok","Raupy","Safcon","Smettbo","Hornliu","Kokuna","Bibor","Taubsi","Tauboga","Tauboss","Rattfratz","Rattikarl","Habitak","Ibitak","Rettan","Arbok","Pikachu","Raichu","Sandan","Sandamer","Nidoran","Nidorina","Nidoqueen","Nidoran","Nidorino","Nidoking","Piepi","Pixi","Vulpix","Vulnona","Pummeluff","Knuddeluff","Zubat","Golbat","Myrapla","Duflor","Giflor","Paras","Parasek","Bluzuk","Omot","Digda","Digdri","Mauzi","Snobilikat","Enton","Entoron","Menki","Rasaff","Fukano","Arkani","Quapsel","Quaputzi","Quappo","Abra","Kadabra","Simsala","Machollo","Maschock","Machomei","Knofensa","Ultrigaria","Sarzenia","Tentacha","Tentoxa","Kleinstein","Georok","Geowaz","Ponita","Gallopa","Flegmon","Lahmus","Magnetilo","Magneton","Porenta","Dodu","Dodri","Jurob","Jugong","Sleima","Sleimok","Muschas","Austos","Nebulak","Alpollo","Gengar","Onix","Traumato","Hypno","Krabby","Kingler","Voltobal","Lektrobal","Owei","Kokowei","Tragosso","Knogga","Kicklee","Nockchan","Schlurp","Smogon","Smogmog","Rihorn","Rizeros","Chaneira","Tangela","Kangama","Seeper","Seemon","Goldini","Golking","Sterndu","Starmie","Pantimos","Sichlor","Rossana","Elektek","Magmar","Pinsir","Tauros","Karpador","Garados","Lapras","Ditto","Evoli","Aquana","Blitza","Flamara","Porygon","Amonitas","Amoroso","Kabuto","Kabutops","Aerodactyl","Relaxo","Arktos","Zapdos","Lavados","Dratini","Dragonir","Dragoran","Mewtu","Mew","Endivie","Lorblatt","Meganie","Feurigel","Igelavar","Tornupto","Karnimani","Tyracroc","Impergator","Wiesor","Wiesenior","Hoothoot","Noctuh","Ledyba","Ledian","Webarak","Ariados","Iksbat","Lampi","Lanturn","Pichu","Pii","Fluffeluff","Togepi","Togetic","Natu","Xatu","Voltilamm","Waaty","Ampharos","Blubella","Marill","Azumarill","Mogelbaum","Quaxo","Hoppspross","Hubelupf","Papungha","Griffel","Sonnkern","Sonnflora","Yanma","Felino","Morlord","Psiana","Nachtara","Kramurx","Laschoking","Traunfugil","Icognito","Woingenau","Girafarig","Tannza","Forstellka","Dummisel","Skorgla","Stahlos","Snubbull","Granbull","Baldorfish","Scherox","Pottrott","Skaraborn","Sniebel","Teddiursa","Ursaring","Schneckmag","Magcargo","Quiekel","Keifel","Corasonn","Remoraid","Octillery","Botogel","Mantax","Panzaeron","Hunduster","Hundemon","Seedraking","Phanpy","Donphan","Porygon2","Damhirplex","Farbeagle","Rabauz","Kapoera","Kussilla","Elekid","Magby","Miltank","Heiteira","Raikou","Entei","Suicune","Larvitar","Pupitar","Despotar","Lugia","Ho-Oh","Celebi","Geckarbor","Reptain","Gewaldro","Flemmli","Jungglut","Lohgock","Hydropi","Moorabbel","Sumpex","Fiffyen","Magnayen","Zigzachs","Geradaks","Waumpel","Schaloko","Papinella","Panekon","Pudox","Loturzel","Lombrero","Kappalores","Samurzel","Blanas","Tengulist","Schwalbini","Schwalboss","Wingull","Pelipper","Trasla","Kirlia","Guardevoir","Gehweiher","Maskeregen","Knilz","Kapilz","Bummelz","Muntier","Letarking","Nincada","Ninjask","Ninjatom","Flurmel","Krakeelo","Krawumms","Makuhita","Hariyama","Azurill","Nasgnet","Eneco","Enekoro","Zobiris","Flunkifer","Stollunior","Stollrak","Stolloss","Meditie","Meditalis","Frizelbliz","Voltenso","Plusle","Minun","Volbeat","Illumise","Roselia","Schluppuck","Schlukwech","Kanivanha","Tohaido","Wailmer","Wailord","Camaub","Camerupt","Qurtel","Spoink","Groink","Pandir","Knacklion","Vibrava","Libelldra","Tuska","Noktuska","Wablu","Altaria","Sengo","Vipitis","Lunastein","Sonnfel","Schmerbe","Welsar","Krebscorps","Krebutack","Puppance","Lepumentas","Liliep","Wielie","Anorith","Armaldo","Barschwa","Milotic","Formeo","Kecleon","Shuppet","Banette","Zwirrlicht","Zwirrklop","Tropius","Palimpalim","Absol","Isso","Schneppke","Firnontor","Seemops","Seejong","Walraisa","Perlu","Aalabyss","Saganabyss","Relicanth","Liebiskus","Kindwurm","Draschel","Brutalanda","Tanhel","Metang","Metagross","Regirock","Regice","Registeel","Latias","Latios","Kyogre","Groudon","Rayquaza","Jirachi","Deoxys","Chelast","Chelcarain","Chelterrar","Panflam","Panpyro","Panferno","Plinfa","Pliprin","Impoleon","Staralili","Staravia","Staraptor","Bidiza","Bidifas","Zirpurze","Zirpeise","Sheinux","Luxio","Luxtra","Knospi","Roserade","Koknodon","Rameidon","Schilterus","Bollterus","Burmy","Burmadame","Moterpel","Wadribie","Honweisel","Pachirisu","Bamelin","Bojelin","Kikugi","Kinoso","Schalellos","Gastrodon","Ambidiffel","Driftlon","Drifzepeli","Haspiror","Schlapor","Traunmagil","Kramshef","Charmian","Shnurgarst","Klingplim","Skunkapuh","Skuntank","Bronzel","Bronzong","Mobai","Pantimimi","Wonneira","Plaudagei","Kryppuk","Kaumalat","Knarksel","Knakrack","Mampfaxo","Riolu","Lucario","Hippopotas","Hippoterus","Pionskora","Piondragi","Glibunkel","Toxiquak","Venuflibis","Finneon","Lumineon","Mantirps","Shnebedeck","Rexblisar","Snibunna","Magnezone","Schlurplek","Rihornior","Tangoloss","Elevoltek","Magbrant","Togekiss","Yanmega","Folipurba","Glaziola","Skorgro","Mamutel","Porygon-Z","Galagladi","Voluminas","Zwirrfinst","Frosdedje","Rotom","Selfe","Vesprit","Tobutz","Dialga","Palkia","Heatran","Regigigas","Giratina","Cresselia","Phione","Manaphy","Darkrai","Shaymin","Arceus","Victini","Serpifeu","Efoserp","Serpiroyal","Floink","Ferkokel","Flambirex","Ottaro","Zwottronin","Admurai","Nagelotz","Kukmarda","Yorkleff","Terribark","Bissbark","Felilou","Kleoparda","Vegimak","Vegichita","Grillmak","Grillchita","Sodamak","Sodachita","Somniam","Somnivora","Dusselgurr","Navitaub","Fasasnob","Elezeba","Zebritz","Kiesling","Sedimantur","Brockoloss","Fleknoil","Fletiamo","Rotomurf","Stalobor","Ohrdoch","Praktibalk","Strepoli","Meistagrif","Schallquap","Mebrana","Branawarz","Jiutesto","Karadonis","Strawickl","Folikon","Matrifol","Toxiped","Rollum","Cerapendra","Waumboll","Elfun","Lilminip","Dressella","Barschuft","Ganovil","Rokkaiman","Rabigator","Flampion","Flampivian","Maracamba","Lithomith","Castellith","Zurrokex","Irokex","Symvolara","Makabaja","Echnatoll","Galapaflos","Karippas","Flapteryx","Aeropteryx","Unratuetox","Deponitox","Zorua","Zoroark","Picochilla","Chillabell","Mollimorba","Hypnomorba","Morbitesse","Monozyto","Mitodos","Zytomega","Piccolente","Swaroness","Gelatini","Gelatroppo","Gelatwino","Sesokitz","Kronjuwild","Emolga","Laukaps","Cavalanzas","Tarnpignon","Hutsassa","Quabbel","Apoquallyp","Mamolida","Wattzapf","Voltula","Kastadur","Tentantel","Klikk","Kliklak","Klikdiklak","Zapplardin","Zapplalek","Zapplarang","Pygraulon","Megalon","Lichtel","Laternecto","Skelabra","Milza","Sharfax","Maxax","Petznief","Siberio","Frigometri","Schnuthelm","Hydragil","Flunschlik","Linfu","Shardrago","Golbit","Golgantes","Gladiantri","Caesurio","Bisofank","Geronimatz","Washakwil","Skallyk","Grypheldis","Furnifrass","Fermicula","Kapuno","Duodino","Trikephalo","Ignivor","Ramoth","Kobalium","Terrakium","Viridium","Boreos","Voltolos","Reshiram","Zekrom","Demeteros","Kyurem","Keldeo","Meloetta","Genesect","Igamaro","Igastarnish","Brigaron","Fynx","Rutena","Fennexis","Froxy","Amphizel","Quajutsu","Scoppel","Grebbit","Dartiri","Dartignis","Fiaro","Purmel","Puponcho","Vivillon","Leufeo","Pyroleo","Flabébé","Floette","Florges","Maehikel","Chevrumm","Pampam","Pandagro","Coiffwaff","Psiau","Psiaugon","Gramokles","Duokles","Durengard","Parfi","Parfinesse","Flauschling","Sabbaione","Iscalar","Calamanero","Bithora","Thanathora","Algitt","Tandrak","Scampisto","Wummer","Eguana","Elezard","Balgoras","Monargoras","Amarino","Amagarga","Feelinara","Resladero","Dedenne","Rocara","Viscora","Viscargot","Viscogon","Clavion","Paragoni","Trombork","Irrbis","Pumpdjinn","Arktip","Arktilas","Efem","Uhafnir","Xerneas","Yveltal","Zygarde","Diancie","Hoopa","Volcanion","Bauz","Arboretoss","Silvarro","Flamiau","Miezunder","Fuegro","Robball","Marikeck","Primarene","Peppeck","Trompeck","Tukanon","Mangunior","Manguspektor","Mabula","Akkup","Donarion","Krabbox","Krawell","Choreogel","Wommel","Bandelby","Wuffels","Wolwerock","Lusardin","Garstella","Aggrostella","Pampuli","Pampross","Araqua","Aranestro","Imantis","Mantidea","Bubungus","Lamellux","Molunk","Amfira","Velursi","Kosturso","Frubberl","Frubaila","Fruyal","Curelei","Kommandutan","Quartermak","Reisslaus","Tectass","Sankabuh","Colossand","Gufa","Typnull","Amigento","Meteno","Koalelu","Tortunator","Togedemaru","Mimigma","Knirfish","Senlong","Moruda","Miniras","Mediras","Grandiras","Kapuriki","Kapufala","Kaputoro","Kapukime","Cosmog","Cosmovum","Solgaleo","Lunala","Anego","Masskito","Schabelle","Voltriant","Kaguron","Katagami","Schlingking","Necrozma","Magearna","Marshadow");
  shuffle($namen);


//Ausgabe des Links zur Auswertung

  //Ausgabe von Namen:
  ?>
    <table id="usernamestb"border=1>
  <?
  for ($i = 0; $i < $teilnehmeranzahl; $i=$i+2){
    ?>
      <tr>
        <td>
          <div class="qrcode"></div>
          <h2><?=$namen[$i] ?></h2>
          <p>Besuche <a href="<?=$base_url ?>"><i><?=$base_url ?></i></a> und treffe die Projektwahl. Der Anmeldename lautet: <strong><?=$namen[$i] ?></strong>.</p>
        </td>
        <td>
          <div class="qrcode"></div>
          <h2><?=$namen[$i+1] ?></h2>
          <p>Besuche <a href="<?=$base_url ?>"><i><?=$base_url ?></i></a> und treffe die Projektwahl. Der Anmeldename lautet: <strong><?=$namen[$i+1] ?></strong>.</p>
        </td>
      </tr>
    <?
    //insert names in db
    $query = "INSERT INTO  teilnehmer (pid, name) VALUES ( '".$bodenId."', '".$namen[$i]."')";
    $eintragen = mysqli_query($db, $query);
    $query = "INSERT INTO  teilnehmer (pid, name) VALUES ( '".$bodenId."', '".$namen[$i+1]."')";
    $eintragen = mysqli_query($db, $query);
  }
  ?>
    </table>
  <?
?>
<script src="js/qrcode.min.js"></script>

<script type="text/javascript">
  $(".qrcode").each(function(o){
  new QRCode(this, "<?=$base_url ?>");
  });
</script>
</body>
</html>
