<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $house_number=fake()->optional(0.8,null)->numberBetween(1,1000);
        $village =fake()->optional(0.4,null)->city();

        $county=['Jelgava','Jūrmala','Liepāja','Ogre','Rēzekne','Rīga','Valmiera','Ventspils','Daugavpils','Jēkabpils','Ādažu novads','Aizkraukles novads','Alūksnes novads','Augšdaugavas novads','Balvu novads','Bauskas novads',
        'Cēsu novads','Dienvidkurzemes novads','Dobeles novads','Gulbenes novads','Jēkabpils novads','Jelgavas novads','Krāslavas novads',
        'Kuldīgas novads','Ķekavas novads','Limbažu novads','Līvānu novads','Ludzas novads','Madonas novads','Mārupes novads','Ogres novads',
        'Olaines novads','Preiļu novads','Rēzeknes novads','Ropažu novads','Salaspils novads','Saldus novads', 'Saulkrastu novads',
        'Siguldas novads','Smiltenes novads','Talsu novads', 'Tukuma novads','Valkas novads','Valmieras novads','Varakļānu novads','Ventspils novads'];

        // $parish=['Abavas pagasts', 'Ābeļu pagasts', 'Aglonas pagasts', 'Ainažu pagasts', 'Aiviekstes pagasts', 'Aizkalnes pagasts', 'Aizkraukles pagasts', 'Aizputes pagasts', 'Aknīstes pagasts', 'Allažu pagasts', 'Alojas pagasts', 'Alsviķu pagasts', 'Amatas pagasts', 'Ambeļu pagasts', 'Ances pagasts', 'Andrupenes pagasts', 'Andzeļu pagasts', 'Annas pagasts', 'Annenieku pagasts', 'Apes pagasts', 'Ārlavas pagasts', 'Aronas pagasts', 'Asares pagasts', 'Asūnes pagasts', 'Atašienes pagasts', 'Audriņu pagasts', 'Augstkalnes pagasts', 'Aulejas pagasts', 'Auru pagasts', 'Babītes pagasts', 'Baldones pagasts', 'Balgales pagasts', 'Balvu pagasts', 'Bārbeles pagasts', 'Barkavas pagasts', 'Bārtas pagasts', 'Bebrenes pagasts', 'Bebru pagasts', 'Beļavas pagasts', 'Bēnes pagasts', 'Bērzaines pagasts', 'Bērzaunes pagasts', 'Bērzes pagasts', 'Bērzgales pagasts', 'Bērziņu pagasts', 'Bērzkalnes pagasts', 'Bērzpils pagasts', 'Biķernieku pagasts', 'Bikstu pagasts', 'Bilskas pagasts', 'Birzgales pagasts', 'Blīdenes pagasts', 'Blomes pagasts', 'Blontu pagasts', 'Brantu pagasts', 'Braslavas pagasts', 'Brenguļu pagasts', 'Briežuciema pagasts', 'Briģu pagasts', 'Brīvzemnieku pagasts', 'Brunavas pagasts', 'Bukaišu pagasts', 'Bunkas pagasts', 'Burtnieku pagasts', 'Cenu pagasts', 'Ceraukstes pagasts', 'Cēres pagasts', 'Cesvaines pagasts', 'Ciblas pagasts', 'Cieceres pagasts', 'Cīravas pagasts', 'Cirmas pagasts', 'Codes pagasts', 'Čornajas pagasts', 'Dagdas pagasts', 'Daudzeses pagasts', 'Daugmales pagasts', 'Daukstu pagasts', 'Dāviņu pagasts', 'Degoles pagasts', 'Dekšāres pagasts', 'Demenes pagasts', 'Dignājas pagasts', 'Dikļu pagasts', 'Dobeles pagasts', 'Drabešu pagasts', 'Dricānu pagasts', 'Drustu pagasts', 'Druvienas pagasts', 'Dubnas pagasts', 'Dunalkas pagasts', 'Dunavas pagasts', 'Dundagas pagasts', 'Dunikas pagasts', 'Durbes pagasts', 'Dvietes pagasts', 'Dzelzavas pagasts', 'Dzērbenes pagasts', 'Džūkstes pagasts', 'Ēdoles pagasts', 'Eglaines pagasts', 'Elejas pagasts', 'Elkšņu pagasts', 'Embūtes pagasts', 'Engures pagasts', 'Ērģemes pagasts', 'Ērgļu pagasts', 'Ēveles pagasts', 'Ezeres pagasts', 'Ezernieku pagasts', 'Feimaņu pagasts', 'Gaigalavas pagasts', 'Gaiķu pagasts', 'Gailīšu pagasts', 'Galēnu pagasts', 'Galgauskas pagasts', 'Gārsenes pagasts', 'Gaujienas pagasts', 'Gaviezes pagasts', 'Ģibuļu pagasts', 'Glūdas pagasts', 'Goliševas pagasts', 'Gramzdas pagasts', 'Grāveru pagasts', 'Griškānu pagasts', 'Grobiņas pagasts', 'Grundzāles pagasts', 'Gudenieku pagasts', 'Īles pagasts', 'Ilzenes pagasts', 'Ilzeskalna pagasts', 'Inčukalna pagasts', 'Indrānu pagasts', 'Indras pagasts', 'Inešu pagasts', 'Ipiķu pagasts', 'Irlavas pagasts', 'Iršu pagasts', 'Īslīces pagasts', 'Isnaudas pagasts', 'Istras pagasts', 'Īvandes pagasts', 'Īves pagasts', 'Izvaltas pagasts', 'Jaunalūksnes pagasts', 'Jaunannas pagasts', 'Jaunauces pagasts', 'Jaunbērzes pagasts', 'Jaungulbenes pagasts', 'Jaunjelgavas pagasts', 'Jaunlaicenes pagasts', 'Jaunlutriņu pagasts', 'Jaunpiebalgas pagasts', 'Jaunpils pagasts', 'Jaunsātu pagasts', 'Jaunsvirlaukas pagasts', 'Jērcēnu pagasts', 'Jersikas pagasts', 'Jeru pagasts', 'Jumpravas pagasts', 'Jumurdas pagasts', 'Jūrkalnes pagasts', 'Kabiles pagasts', 'Kaives pagasts', 'Kalētu pagasts', 'Kalkūnes pagasts', 'Kalna pagasts', 'Kalncempju pagasts', 'Kalnciema pagasts', 'Kalniešu pagasts', 'Kalsnavas pagasts', 'Kalupes pagasts', 'Kalvenes pagasts', 'Kandavas pagasts', 'Kantinieku pagasts', 'Kaplavas pagasts', 'Kārķu pagasts', 'Kastuļinas pagasts', 'Katvaru pagasts', 'Kauguru pagasts', 'Kaunatas pagasts', 'Kazdangas pagasts', 'Ķeipenes pagasts', 'Ķekavas pagasts', 'Ķepovas pagasts', 'Klintaines pagasts', 'Kocēnu pagasts', 'Kokneses pagasts', 'Kolkas pagasts', 'Kombuļu pagasts', 'Konstantinovas pagasts', 'Ķoņu pagasts', 'Krapes pagasts', 'Krāslavas pagasts', 'Krimuldas pagasts', 'Krimūnu pagasts', 'Krišjāņu pagasts', 'Krustpils pagasts', 'Kubulu pagasts', 'Kūku pagasts', 'Ķūļciema pagasts', 'Kupravas pagasts', 'Kurmāles pagasts', 'Kurmenes pagasts', 'Kursīšu pagasts', 'Laidu pagasts', 'Laidzes pagasts', 'Lapmežciema pagasts', 'Lauberes pagasts', 'Laucesas pagasts', 'Laucienes pagasts', 'Lauderu pagasts', 'Ļaudonas pagasts', 'Launkalnes pagasts', 'Lažas pagasts', 'Lazdonas pagasts', 'Lazdukalna pagasts', 'Lazdulejas pagasts', 'Lēdmanes pagasts', 'Lēdurgas pagasts', 'Leimaņu pagasts', 'Lejasciema pagasts', 'Lendžu pagasts', 'Lestenes pagasts', 'Lībagu pagasts', 'Līdumnieku pagasts', 'Lielauces pagasts', 'Lielplatones pagasts', 'Lielvārdes pagasts', 'Liepas pagasts', 'Liepnas pagasts', 'Liepupes pagasts', 'Liezēres pagasts', 'Līgatnes pagasts', 'Līgo pagasts', 'Līksnas pagasts', 'Limbažu pagasts', 'Litenes pagasts', 'Līvbērzes pagasts', 'Lizuma pagasts', 'Lodes pagasts', 'Lubes pagasts', 'Lutriņu pagasts', 'Lūznavas pagasts', 'Madlienas pagasts', 'Mākoņkalna pagasts', 'Malienas pagasts', 'Maļinovas pagasts', 'Malnavas pagasts', 'Maltas pagasts', 'Mālupes pagasts', 'Mārcienas pagasts', 'Mārkalnes pagasts', 'Mārsnēnu pagasts', 'Matīšu pagasts', 'Matkules pagasts', 'Mazozolu pagasts', 'Mazsalacas pagasts', 'Mazzalves pagasts', 'Medņevas pagasts', 'Medumu pagasts', 'Medzes pagasts', 'Meņģeles pagasts', 'Mērdzenes pagasts', 'Mētrienas pagasts', 'Mežāres pagasts', 'Mežotnes pagasts', 'Mežvidu pagasts', 'Mores pagasts', 'Murmastienes pagasts', 'Nagļu pagasts', 'Naudītes pagasts', 'Naujenes pagasts', 'Naukšēnu pagasts', 'Nautrēnu pagasts', 'Neretas pagasts', 'Nīcas pagasts', 'Nīcgales pagasts', 'Nīgrandes pagasts', 'Nīkrāces pagasts', 'Nirzas pagasts', 'Nītaures pagasts', 'Novadnieku pagasts', 'Ņukšu pagasts', 'Ogresgala pagasts', 'Olaines pagasts', 'Ošupes pagasts', 'Otaņķu pagasts', 'Ozolaines pagasts', 'Ozolmuižas pagasts', 'Ozolnieku pagasts', 'Padures pagasts', 'Pāles pagasts', 'Palsmanes pagasts', 'Pampāļu pagasts', 'Pasienes pagasts', 'Pededzes pagasts', 'Pelču pagasts', 'Pelēču pagasts', 'Penkules pagasts', 'Piedrujas pagasts', 'Pildas pagasts', 'Pilskalnes pagasts (Ilūkste)', 'Pilskalnes pagasts (Nereta)', 'Piltenes pagasts', 'Plāņu pagasts', 'Platones pagasts', 'Popes pagasts', 'Praulienas pagasts', 'Preiļu pagasts', 'Priekules pagasts', 'Priekuļu pagasts', 'Prodes pagasts', 'Pureņu pagasts', 'Pūres pagasts', 'Pušas pagasts', 'Pušmucovas pagasts', 'Puzes pagasts', 'Raiskuma pagasts', 'Ramatas pagasts', 'Rankas pagasts', 'Raņķu pagasts', 'Raunas pagasts', 'Rembates pagasts', 'Remtes pagasts', 'Rencēnu pagasts', 'Rendas pagasts', 'Riebiņu pagasts', 'Rikavas pagasts', 'Rites pagasts', 'Robežnieku pagasts', 'Rožkalnu pagasts', 'Rožupes pagasts', 'Rubas pagasts', 'Rubenes pagasts', 'Rucavas pagasts', 'Rudbāržu pagasts', 'Rudzātu pagasts', 'Rugāju pagasts', 'Rumbas pagasts', 'Rundāles pagasts', 'Rundēnu pagasts', 'Rušonas pagasts', 'Sakas pagasts', 'Sakstagala pagasts', 'Salacgrīvas pagasts', 'Salas pagasts (Jēkabpils)', 'Salas pagasts (Rīga)', 'Salaspils pagasts', 'Saldus pagasts', 'Salgales pagasts', 'Salienas pagasts', 'Salnavas pagasts', 'Sarkaņu pagasts', 'Saukas pagasts', 'Saulkrastu pagasts', 'Saunas pagasts', 'Sausnējas pagasts', 'Seces pagasts', 'Šēderes pagasts', 'Sēlpils pagasts', 'Sēļu pagasts', 'Sēmes pagasts', 'Sērenes pagasts', 'Sesavas pagasts', 'Siguldas pagasts', 'Silajāņu pagasts', 'Silmalas pagasts', 'Sīļukalna pagasts', 'Skaistas pagasts', 'Skaistkalnes pagasts', 'Skaņkalnes pagasts', 'Šķaunes pagasts', 'Šķēdes pagasts', 'Šķeltovas pagasts', 'Šķilbēnu pagasts', 'Skrudalienas pagasts', 'Skrundas pagasts', 'Skujenes pagasts', 'Skultes pagasts', 'Slampes pagasts', 'Smārdes pagasts', 'Smiltenes pagasts', 'Snēpeles pagasts', 'Sokolku pagasts', 'Stabulnieku pagasts', 'Staburaga pagasts', 'Staiceles pagasts', 'Stalbes pagasts', 'Stāmerienas pagasts', 'Stelpes pagasts', 'Stoļerovas pagasts', 'Stradu pagasts', 'Straupes pagasts', 'Strazdes pagasts', 'Stružānu pagasts', 'Sunākstes pagasts', 'Suntažu pagasts', 'Susāju pagasts', 'Sutru pagasts', 'Svariņu pagasts', 'Sventes pagasts', 'Svētes pagasts', 'Svitenes pagasts', 'Tabores pagasts', 'Tadaiķu pagasts', 'Tārgales pagasts', 'Taurenes pagasts', 'Taurupes pagasts', 'Tērvetes pagasts', 'Tilžas pagasts', 'Tīnūžu pagasts', 'Tirzas pagasts', 'Tomes pagasts', 'Trapenes pagasts', 'Trikātas pagasts', 'Tumes pagasts', 'Turku pagasts', 'Turlavas pagasts', 'Ūdrīšu pagasts', 'Ugāles pagasts', 'Ukru pagasts', 'Umurgas pagasts', 'Upmalas pagasts', 'Usmas pagasts', 'Užavas pagasts', 'Vaboles pagasts', 'Vadakstes pagasts', 'Vaidavas pagasts', 'Vaiņodes pagasts', 'Vaives pagasts', 'Valdgales pagasts', 'Valgundes pagasts', 'Valkas pagasts', 'Valles pagasts', 'Valmieras pagasts', 'Vandzenes pagasts', 'Vānes pagasts', 'Varakļānu pagasts', 'Variešu pagasts', 'Variņu pagasts', 'Vārkavas pagasts', 'Vārmes pagasts', 'Vārves pagasts', 'Vecates pagasts', 'Vecauces pagasts', 'Veclaicenes pagasts', 'Vecpiebalgas pagasts', 'Vecpils pagasts', 'Vecsalienas pagasts', 'Vecsaules pagasts', 'Vectilžas pagasts', 'Vecumnieku pagasts', 'Vecumu pagasts', 'Vērēmu pagasts', 'Vērgales pagasts', 'Veselavas pagasts', 'Vestienas pagasts', 'Vidrižu pagasts', 'Viesatu pagasts', 'Viesītes pagasts', 'Viesturu pagasts', 'Vietalvas pagasts', 'Vijciema pagasts', 'Vīksnas pagasts', 'Viļānu pagasts', 'Vilces pagasts', 'Viļķenes pagasts', 'Vilpulkas pagasts', 'Vīpes pagasts', 'Virbu pagasts', 'Vircavas pagasts', 'Virešu pagasts', 'Virgas pagasts', 'Višķu pagasts', 'Vītiņu pagasts', 'Zaļenieku pagasts', 'Zaļesjes pagasts', 'Zalves pagasts', 'Zaņas pagasts', 'Zantes pagasts', 'Zasas pagasts', 'Zaubes pagasts', 'Zebrenes pagasts', 'Zeltiņu pagasts', 'Zemītes pagasts', 'Zentenes pagasts', 'Ziemera pagasts', 'Žīguru pagasts', 'Zilākalna pagasts', 'Zirņu pagasts', 'Ziru pagasts', 'Zlēku pagasts', 'Zosēnu pagasts', 'Zvārdes pagasts', 'Zvārtavas pagasts', 'Zvirgzdenes pagasts'];

        // $city=['Ainaži', 'Aizkraukle', 'Aizpute', 'Aknīste', 'Aloja', 'Alūksne', 'Ape', 'Auce', 'Baldone', 'Baloži', 'Balvi', 'Bauska', 'Brocēni', 'Cēsis', 'Cesvaine', 'Dagda', 'Daugavpils', 'Dobele', 'Durbe', 'Grobiņa', 'Gulbene', 'Ikšķile', 'Ilūkste', 'Jaunjelgava', 'Jēkabpils', 'Jelgava', 'Jūrmala', 'Kandava', 'Kārsava', 'Ķegums', 'Krāslava', 'Kuldīga', 'Lielvārde', 'Liepāja', 'Līgatne', 'Limbaži', 'Līvāni', 'Lubāna', 'Ludza', 'Madona', 'Mazsalaca', 'Ogre', 'Olaine', 'Pāvilosta', 'Piltene', 'Pļaviņas', 'Preiļi', 'Priekule', 'Rēzekne', 'Rīga', 'Rūjiena', 'Sabile', 'Salacgrīva', 'Salaspils', 'Saldus', 'Saulkrasti', 'Seda', 'Sigulda', 'Skrunda', 'Smiltene', 'Staicele', 'Stende', 'Strenči', 'Subate', 'Talsi', 'Tukums', 'Valdemārpils', 'Valka', 'Valmiera', 'Vangaži', 'Varakļāni', 'Ventspils', 'Viesīte', 'Viļaka', 'Viļāni', 'Zilupe'];
        
        // if(!$house_number==null)
        // {
        //     $street = fake()->streetName();
        // }

        // if($house_number==null )
        // {
        //     $apartment_number=null;
        //     $house_name = fake()->word();
        //     $street = null;
        //     $city = null;
        //     $village=null;
        // }


        // if(!$house_number==null && !$village==null)
        // { 
        //     $apartment_number = fake()->optional(0.6,null)->numberBetween(1,200);
        //     $house_name =null;
        //     $street = fake()->streetName();
        //     $city = null;

        // }
        // if(!$house_number==null && $village==null)
        // { 
        //     $apartment_number = fake()->optional(0.6,null)->numberBetween(1,200);
        //     $house_name =null;
        //     $street = fake()->streetName();
        //     $city = fake()->randomElement($city);
        // }
        
            // }else{
        //     $apartment_number = fake()->optional(0.6,null)->numberBetween(1,200);
        //     $house_name =null;
        //     $street = fake()->streetName();
        //     $village = null;
        //     $cityname=fake()->randomElement($city);
        // }

        return [
            'country' => "Latvija",
            'county_or_city' => fake()->randomElement($county),
            'address' => fake()->address()
            // 'parish' => fake()->randomElement($parish),
            // 'city' => $city,
            // 'village' => $village,
            // 'street' => $street,
            //'house_number'=>fake()->numberBetween(1,1000),
            //'apartment_number'=>fake()->optional(0.5,null)->numberBetween(1,200),
            //'apartment_number'=>fake()->numberBetween(1,200),
            // 'house_number'=>$house_number,
            // 'apartment_number'=> $apartment_number,
            // 'house_name'=>$house_name,

            // 'user_id'=>User::factory(),
            
        ];
    }
}
