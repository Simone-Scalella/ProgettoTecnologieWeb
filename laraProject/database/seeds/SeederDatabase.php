<?php

use Illuminate\Database\Seeder;

class SeederDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        DB::statement('TRUNCATE `acquisto_biglietto`');
        DB::statement('TRUNCATE `evento`');
        DB::statement('TRUNCATE `faq`');
        DB::statement('TRUNCATE `migrations`');
        DB::statement('TRUNCATE `partecipazione`');
        DB::statement('TRUNCATE `province`');
        DB::statement('TRUNCATE `user`');
        DB::statement('TRUNCATE `user2`');
        DB::statement('TRUNCATE `user3`');
        DB::statement('TRUNCATE `user4`');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        /*struttura popolatore di massa dello stile SQL*/
        /*
        'nome tabella1'=>
        [  
            'key' = [attributo1,attributo2...attributo_n],
            'value'= sono le righe dell'inserimento
            [
                [valore attributo1,valore attributo2,....,valore attributo_n],
                [valore attributo1,valore attributo2,....,valore attributo_n],
                .
                .
                .
            ]
        ]
        */
        $Database = 
        [
            'user'=>
            [
                'key' => ['username', 'password'],                 
                'value' =>
                [
                    ['Admin', Hash::make('password')],
                    ['cami', Hash::make('password')],
                    ['Federica', Hash::make('password')],
                    ['Leo', Hash::make('password')],
                    ['simone', Hash::make('password')],
                    ['Chiara', Hash::make('password')],    
                    ['MatteoC', Hash::make('password')],
                    ['Zerbi',Hash::make('password')],
                    ['pluto',Hash::make('password')],
                    ['Annalisa',Hash::make('password')],
                    ['CamillaLive',Hash::make('password')],
                    ['Jovanotti',Hash::make('password')],
                    ['TizianoFerro',Hash::make('password')],
                    ['clieclie',Hash::make('3RZ2jy98')],
                    ['orgaorga',Hash::make('3RZ2jy98')],
                    ['adminadmin',Hash::make('3RZ2jy98')]
                    
                ]
            ],

            'user2'=>
            [
                'key' => ['username', 'nome', 'cognome', 'via_residenza', 'numero_civ', 'citta', 'data_nascita'],
                'value' =>
                [
                    ['cami', 'camilla', 'dandrea', 'via ppugl', 48, 'AP', '1999-07-09'],
                    ['MatteoC', 'Matteo', 'Ciccanti', 'casdLama', 2, 'AP', '1990-10-20'],
                    ['Chiara', 'Chiara', 'Buondi', 'via a', 2, 'Ancona', '2000-11-01'],
                    ['CamillaLive', 'Camilla','DA','Rocca',45,'Ascoli','1999-11-09'],
                    ['clieclie', 'clienteProf','Cucchiarelli','Via Breccie Bianche',121,'Ancona','2021-06-21'],
        
                ]
            ],

            'user3' => 
            [
                'key' => ['username', 'citta', 'tipo_societa', 'nome_organizzazione'],
                'value' =>
                [
                    ['Federica', 'Ancona', 'personale', 'Fedevent'],
                    ['Leo', 'Ancona', 'personale', 'leo'],
                    ['Jovanotti', 'Ancona', 'SRL', 'Jova'],
                    ['TizianoFerro', 'Roma', 'personale', 'Eventi_cantanti'],
                    ['simone', 'Ancona', 'Onlus', '4event'],
                    ['Annalisa', 'Milano', 'spa', 'Emergenti'],
                    ['orgaorga','Ancona','universita\'','univpm'],
          
                ]
            ],

            'user4' =>
            [
                'key' => ['username','nome','cognome'],
                'value'=>
                [
                    ['Admin','Amministratore','Supremo'],
                    ['adminadmin','Alessandro','Prof.'],
                    ['Zerbi','Alex','Zerb']
                ]

            ],

            'evento'=>
            [
                'key'=> ['id_evento', 'nome_evento', 'data_evento', 'durata', 'immagine', 'incasso_evento', 'prezzo_unitario', 'numero_biglietti', 'indirizzo_evento', 'citta', 'provincia', 'regione', 'descrizione', 'organizzatore', 'data_sconto', 'prezzo_scontato', 'sconto', 'indicazioni','programma'],
                'value'=>
                [
                    [1, 'JovaBeach', '2021-08-17 23:03:00', 4, '7zsWLtCX.jpg', '134.400', '19.200', 320, 'Via Lorenzo Machiavelli, 74', 'Lido di Fermo', 'FM', 'Marche', 'Lo spettacolare tour che cambierà la storia dei live in Italia, il primo live in spiaggia!', 'Jovanotti', '2021-07-03 13:06:57', '0.000', '40.000','Percorrendo autostrada le uscite più vicine al centro di Lido di Fermo sono:Uscita Porto S.Elpidio  A14 autostrada Adriatica, In Aereo: Aereoporto di Falconara','ora1:Lorem ipsum dolor sit amet, consectetur adipiscing elit. ora2:Sed eu mattis leo. Proin efficitur metus sed scelerisque maximus. ora3:Praesent placerat turpis sit amet felis hendrerit condimentum eget nec nibh. ora4:Nunc at malesuada tellus, non venenatis quam.'],
                    [2, ' ColapesceDiMartino In Tour', '2021-09-17 23:03:00', 2, 'default.jpg', '0.000', '20.500', 500, 'Lungotevere Castello, 50', 'Roma', 'RM', 'Lazio', 'A grande richiesta, dopo il sold out in sole 6 ore del concerto al Teatro Antico di Taormina del prossimo 28 agosto, si aggiungono nuove date al tour estivo di Colapesce e Dimartino.', 'Federica', '2021-08-09 13:06:57', '0.000', '20.000','Tutte le strade portano a Roma, ma come si arriva a Piazza San Pietro? Bus: 64, 916, 982 Treno: FC3, FL3, FL5','Integer arcu ligula, feugiat a vestibulum nec, rutrum vitae augue.'],
                    [3, 'TZN Stadi', '2022-05-17 21:03:00', 5, 'default.jpg', '0.000', '25.000', 100, 'Viale V. Pepe', 'Pescara', 'PE', 'Abruzzo', ' Il tour di Tiziano Ferro che tutti aspettavano avrà luogo nei più importanti stadi italiani.', 'TizianoFerro', '2021-06-03 13:06:57', '12.5000', '50.000','Indicazioni per GIovanni COrnacchia: Per chi arriverà in Treno, le fermate più vicine a Stadio Adriatico "Giovanni Cornacchia" a Pescara sono: Pescara Tribunale	20 min a piedi, Pescara Porta Nuova	27 min a piedi, Pescara Centrale	40 min a piedi. Per il bus invece ci sono svariate fermate, per esempio Viale D Avalos, 172	5 min a piedi o Viale Guglielmo Marconi, 320	10 min a piedi. In auto prendere l uscita Città SantAngelo-Pescara Nord','Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
                    [4, 'Annalisa Party in Tour', '2021-11-31 23:03:00', 0, 'fulminacci-biglietti.jpg', '19.200', '19.200', 460, 'Via Gaudenzio Fantoli, 9', 'Milano', 'MN', 'Lombardia', 'Alla luce delle vigenti disposizioni ministeriali, il “Party In Tour” di Annalisa, il live previsto potrebbe essere rinviato. I biglietti precedentemente acquistati rimangono validi per la nuova data.Questo concerto sarà una grande festa e sarà la data di apertura di “Nali10Club”, il tour nei principali club italiani.', 'Annalisa', '2021-06-03 13:06:57', '0.000', '0.000','IN AUTO:Uscita MECENATE – tangenziale est.Uscita CAMM – tangenziale est PARCHEGGI GRATUITI: vedi mappa.PARCHEGGI PRIVATI: nessuno dei parcheggi privati di fronte al locale è da noi autorizzato nè tanto meno di nostra proprietà. IN TRENO: Da Milano Centrale prendete la Linea 60 da P.za Duca D’Aosta per 11 fermate a scendete a “Via Cadore / C.so Ventidue Marzo”. Da qui prendete la linea 27 per 13 fermate e scendete in “Via Mecenate / Via Fantoli”.Da Milano Porta Garibaldi prendete la metropolitana Linea 2 (Verde) in direzione Gessate / Cologno e scendete a Piola. Da Piola prendete la linea 90 (Circolare destra) per 7 fermate e scendete alla fermata “V.le Campania / V.le Corsica”. Da qui prendete la linea 27 per 10 fermate e scendete in “Via Mecenate / Via Fantoli”.Da Milano Cadorna percorrete la metropolitana Linea 1 (Rossa) in direzione Sesto 1 Maggio FS e scendete dopo 4 fermate a San Babila. Da qui dirigetevi a piedi a Largo Augusto per prendere la Linea 27 per 18 fermate e scendete in “Via Mecenate / Via Fantoli”.Da Aeroporto Milano Linate raggiungete la fermata Segrate SP15b/Baracca e prendete il bus K512 per 4 fermate. Scendete alla fermata via Mecenate – via Fantoli.','Curabitur dictum ex et dolor sagittis condimentum. Vestibulum semper, ante in laoreet aliquam, sapien dolor porttitor est, at ullamcorper mauris felis sed ex. Integer dictum rhoncus orci sit amet cursus. Sed vel metus et neque consequat congue. Cras nec consectetur urna, at bibendum risus. Pellentesque at tristique elit, euismod pellentesque tellus. Pellentesque a vestibulum erat, vel auctor orci.'],
                    [5, 'Concertone 31Dicembre', '2021-12-31 00:51:59', 10, 'default.jpg', '0.000', '12.500', 56, 'Piazza San Giovanni In laterano', 'Roma', 'RM', 'Lazio', 'll Concertone del 31 Dicembre è un festival musicale che dal 1990 è organizzato annualmente in occasione della Festa del lavoro in piazza San Giovanni in Laterano a Roma. Levento è chiamato Concertone per via della sua durata, avendo inizio nel pomeriggio e terminando a tarda notte', 'Leo', '2021-12-30 13:06:57', '0.000', '60.000','In Metro prendi La linea A, Cambia al Colosseo con la Metro B, ci sarà una fermata San Giovanni','Ut nisl enim, posuere quis finibus sit amet, aliquam et nisl. Sed dapibus bibendum suscipit. Fusce consectetur elementum mauris, sit amet euismod lectus. Vestibulum massa enim, luctus in nisl vel, scelerisque tempus sapien. Vivamus gravida consectetur consequat. Duis tempor dolor convallis metus maximus ullamcorper. Nullam eu tincidunt orci, eget imperdiet justo. Sed varius lobortis consequat. Etiam eu maximus dolor, in rhoncus arcu.'],
                    [6, 'ManeskinLive', '2021-06-06 03:28:00', 3, 'fulminacci-biglietti.jpg', '120.000', '30.000', 5, 'Via Mario Torresi 121', 'Ancona', 'AN', 'Marche', 'Dopo la storica vittoria all’Eurovision Song Contest 2021 con “Zitti e Buoni” (doppio disco di platino), i Måneskin, richiesti in tutta Europa, saranno nei più importanti Festival nell’estate 2022 e annunciano oggi le prime date previste al Rock Am Ring di Nürburg e al Rock Im Park di Norimberga (Nürnberg), festival attesissimi dal pubblico di tutta Europa sui cui palchi si sono esibiti i più grandi nomi della musica mondiale e che si svolgeranno dal 3 al 5 giugno. La prestigiosa lineup del 2022 include artisti del calibro di Green Day, Muse, Volbeat, Bullet For My Valentine, Lewis Capaldi e molti altri.', 'simone', '2021-06-03 13:06:57', '24.000', '20.000','Dalla stazione prendi la linea 1/4 e scendi in Via torresi, In Aereo l aereoporto piu vicino è quello di Falconara','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu mattis leo. Proin efficitur metus sed scelerisque maximus. Praesent placerat turpis sit amet felis hendrerit condimentum eget nec nibh. Nunc at malesuada tellus, non venenatis quam. Aenean egestas nulla nec bibendum mattis.'],
                    

                ]

            ],
            
            'acquisto_biglietto' =>
            [
                'key' => ['user2', 'id_evento', 'quantita', 'data_acquisto', 'tipo_pagamento', 'costo', 'id_acquisto'],
                'value' =>
                [
                    ['cami', 4, 1, '2021-06-04 03:09:52', 'visa', '19.20', 2],
                    ['cami', 6, 1, '2021-06-04 03:10:17', 'visa', '30.00', 3],
                ]
            ], 

            'partecipazione' =>
            [
                'key' => ['user2', 'id_evento', 'data_click'],
                'value'=>
                [
                    ['cami', 1, '2021-06-04 03:06:43'],
                    ['cami', 2, '2021-06-04 03:10:09'],
                    ['CamillaLive', 1, '2021-06-04 03:25:08'],
                    ['CamillaLive', 6, '2021-06-04 03:25:21'],
                    ['MatteoC', 4, '2021-06-04 03:30:37'],
                    ['MatteoC', 6, '2021-06-04 03:32:33'],
                    ['MatteoC', 3, '2021-06-04 03:32:36'],
                    ['Chiara', 2, '2021-06-04 03:33:01'],
                ]
            ],

            'faq' =>
            [
                'key' => ['numero', 'Domanda', 'risposta'],
                'value' =>
                [
                    [1,'DOPO AVER COMPRATO UN BIGLIETTO, POSSO ACQUISTARNE UN ALTRO?','Si dopo aver acquistato un biglietto se hai i soldi puoi comprare tutto quello che vuoi ' ],
                    [2,'COSA FARE IN CASO DI EVENTO ANNULLATO PER COVID-19?','Puoi richiedere un voucher di pari importo del prezzo del tuo biglietto ad assistenzaclienti@by4event.it. Sarà nostra premura chiederti una scansione del biglietto ed ulteriori informazioni per erogare il voucher. ' ],
                    [3,'PER ACQUISTARE DEVO ESSERE REGISTRATO NEL SITO DI BY4EVENT?','Si, devi prima registrati per acquistare i nostri biglietti.' ],
                    [4,'SPEDITE I TICKET O SONO E-TICKET STAMPABILI?','E prevista una consegna del biglietto tramite corriere espresso nelle 48 ore successive all avvenuto pagamento. Per le Isole potrebbero esserci tempi piu lunghi.' ],
                    [5,'COME POSSO CONTATTARE IL SERVIZIO CLIENTI DI BY4EVENT?','Nella sezione CONTATTACI troverai tutti i metodi a tua disposizione per metterti in contatto con il ns Servizio Clienti.']
                ]
    
            ],

            'province'=>
            [
                'key'=> ['id_province', 'nome_province', 'sigla_province', 'regione_province'],
                'value' =>
                [
                    [1, 'Agrigento', 'AG', 'Sicilia'],
                    [2, 'Alessandria', 'AL', 'Piemonte'],
                    [3, 'Ancona', 'AN', 'Marche'],
                    [4, 'Arezzo', 'AR', 'Toscana'],
                    [5, 'Ascoli Piceno', 'AP', 'Marche'],
                    [6, 'Asti', 'AT', 'Piemonte'],
                    [7, 'Avellino', 'AV', 'Campania'],
                    [8, 'Bari', 'BA', 'Puglia'],
                    [9, 'Barletta-Andria-Trani', 'BT', 'Puglia'],
                    [10, 'Belluno', 'BL', 'Veneto'],
                    [11, 'Benevento', 'BN', 'Campania'],
                    [12, 'Bergamo', 'BG', 'Lombardia'],
                    [13, 'Biella', 'BI', 'Piemonte'],
                    [14, 'Bologna', 'BO', 'Emilia-Romagna'],
                    [15, 'Bolzano', 'BZ', 'Trentino-Alto Adige'],
                    [16, 'Brescia', 'BS', 'Lombardia'],
                    [17, 'Brindisi', 'BR', 'Puglia'],
                    [18, 'Cagliari', 'CA', 'Sardegna'],
                    [19, 'Caltanissetta', 'CL', 'Sicilia'],
                    [20, 'Campobasso', 'CB', 'Molise'],
                    [21, 'Carbonia-Iglesias', 'CI', 'Sardegna'],
                    [22, 'Caserta', 'CE', 'Campania'],
                    [23, 'Catania', 'CT', 'Sicilia'],
                    [24, 'Catanzaro', 'CZ', 'Calabria'],
                    [25, 'Chieti', 'CH', 'Abruzzo'],
                    [26, 'Como', 'CO', 'Lombardia'],
                    [27, 'Cosenza', 'CS', 'Calabria'],
                    [28, 'Cremona', 'CR', 'Lombardia'],
                    [29, 'Crotone', 'KR', 'Calabria'],
                    [30, 'Cuneo', 'CN', 'Piemonte'],
                    [31, 'Enna', 'EN', 'Sicilia'],
                    [32, 'Fermo', 'FM', 'Marche'],
                    [33, 'Ferrara', 'FE', 'Emilia-Romagna'],
                    [34, 'Firenze', 'FI', 'Toscana'],
                    [35, 'Foggia', 'FG', 'Puglia'],
                    [36, 'Forlì-Cesena', 'FC', 'Emilia-Romagna'],
                    [37, 'Frosinone', 'FR', 'Lazio'],
                    [38, 'Genova', 'GE', 'Liguria'],
                    [39, 'Gorizia', 'GO', 'Friuli-Venezia Giulia'],
                    [40, 'Grosseto', 'GR', 'Toscana'],
                    [41, 'Imperia', 'IM', 'Liguria'],
                    [42, 'Isernia', 'IS', 'Molise'],
                    [43, 'L\'Aquila', 'AQ', 'Abruzzo'],
                    [44, 'La Spezia', 'SP', 'Liguria'],
                    [45, 'Latina', 'LT', 'Lazio'],
                    [46, 'Lecce', 'LE', 'Puglia'],
                    [47, 'Lecco', 'LC', 'Lombardia'],
                    [48, 'Livorno', 'LI', 'Toscana'],
                    [49, 'Lodi', 'LO', 'Lombardia'],
                    [50, 'Lucca', 'LU', 'Toscana'],
                    [51, 'Macerata', 'MC', 'Marche'],
                    [52, 'Mantova', 'MN', 'Lombardia'],
                    [53, 'Massa e Carrara', 'MS', 'Toscana'],
                    [54, 'Matera', 'MT', 'Basilicata'],
                    [55, 'Medio Campidano', 'VS', 'Sardegna'],
                    [56, 'Messina', 'ME', 'Sicilia'],
                    [57, 'Milano', 'MI', 'Lombardia'],
                    [58, 'Modena', 'MO', 'Emilia-Romagna'],
                    [59, 'Monza e Brianza', 'MB', 'Lombardia'],
                    [60, 'Napoli', 'NA', 'Campania'],
                    [61, 'Novara', 'NO', 'Piemonte'],
                    [62, 'Nuoro', 'NU', 'Sardegna'],
                    [63, 'Ogliastra', 'OG', 'Sardegna'],
                    [64, 'Olbia-Tempio', 'OT', 'Sardegna'],
                    [65, 'Oristano', 'OR', 'Sardegna'],
                    [66, 'Padova', 'PD', 'Veneto'],
                    [67, 'Palermo', 'PA', 'Sicilia'],
                    [68, 'Parma', 'PR', 'Emilia-Romagna'],
                    [69, 'Pavia', 'PV', 'Lombardia'],
                    [70, 'Perugia', 'PG', 'Umbria'],
                    [71, 'Pesaro e Urbino', 'PU', 'Marche'],
                    [72, 'Pescara', 'PE', 'Abruzzo'],
                    [73, 'Piacenza', 'PC', 'Emilia-Romagna'],
                    [74, 'Pisa', 'PI', 'Toscana'],
                    [75, 'Pistoia', 'PT', 'Toscana'],
                    [76, 'Pordenone', 'PN', 'Friuli-Venezia Giulia'],
                    [77, 'Potenza', 'PZ', 'Basilicata'],
                    [78, 'Prato', 'PO', 'Toscana'],
                    [79, 'Ragusa', 'RG', 'Sicilia'],
                    [80, 'Ravenna', 'RA', 'Emilia-Romagna'],
                    [81, 'Reggio Calabria(metropolitana]', 'RC', 'Calabria'],
                    [82, 'Reggio Emilia', 'RE', 'Emilia-Romagna'],
                    [83, 'Rieti', 'RI', 'Lazio'],
                    [84, 'Rimini', 'RN', 'Emilia-Romagna'],
                    [85, 'Roma', 'RM', 'Lazio'],
                    [86, 'Rovigo', 'RO', 'Veneto'],
                    [87, 'Salerno', 'SA', 'Campania'],
                    [88, 'Sassari', 'SS', 'Sardegna'],
                    [89, 'Savona', 'SV', 'Liguria'],
                    [90, 'Siena', 'SI', 'Toscana'],
                    [91, 'Siracusa', 'SR', 'Sicilia'],
                    [92, 'Sondrio', 'SO', 'Lombardia'],
                    [93, 'Taranto', 'TA', 'Puglia'],
                    [94, 'Teramo', 'TE', 'Abruzzo'],
                    [95, 'Terni', 'TR', 'Umbria'],
                    [96, 'Torino', 'TO', 'Piemonte'],
                    [97, 'Trapani', 'TP', 'Sicilia'],
                    [98, 'Trento', 'TN', 'Trentino-Alto Adige'],
                    [99, 'Treviso', 'TV', 'Veneto'],
                    [100, 'Trieste', 'TS', 'Friuli-Venezia Giulia'],
                    [101, 'Udine', 'UD', 'Friuli-Venezia Giulia'],
                    [102, 'Aosta', 'AO', 'Valle d\'Aosta'],
                    [103, 'Varese', 'VA', 'Lombardia'],
                    [104, 'Venezia', 'VE', 'Veneto'],
                    [105, 'Verbano-Cusio-Ossola', 'VB', 'Piemonte'],
                    [106, 'Vercelli', 'VC', 'Piemonte'],
                    [107, 'Verona', 'VR', 'Veneto'],
                    [108, 'Vibo Valentia', 'VV', 'Calabria'],
                    [109, 'Vicenza', 'VI', 'Veneto'],
                    [110, 'Viterbo', 'VT', 'Lazio']
    
                ]
            ]
        ];

        foreach ($Database as $table => $content)
        {
            foreach  ($content['value'] as $row)
            {
                DB::table($table)->insert(array_combine($content['key'],$row)); 
            }
            
        }

       
    
    }
}
