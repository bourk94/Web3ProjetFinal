<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            [
                'titre'=>'The Lord of the Rings: The Fellowship of the Ring',
                'realisateur'=>'Peter Jackson',
                'genre'=>'Fantastique',
                'duree'=>178,
                'annee_sortie'=>2001,
                'synopsis'=>'Un jeune et timide \'Hobbit\', Frodon Sacquet, hérite d\'un anneau magique. Bien loin d\'être une simple babiole, il s\'agit d\'un instrument de pouvoir absolu qui permettrait à Sauron, le \'Seigneur des ténèbres\', de régner sur la \'Terre du Milieu\' et de réduire en esclavage ses peuples. Frodon doit parvenir jusqu\'à la \'Crevasse du Destin\' pour détruire l\'anneau.',
                'image'=>'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcT9J7XACn3tlD6v4UXRMvT2wJN8FGCCPeh8U3RkZ6__tR4wGhSo',
                'trailer'=>'https://www.youtube.com/embed/_nZdmwHrcnw',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'titre'=>'The Lord of the Rings: The Two Towers',
                'realisateur'=>'Peter Jackson',
                'genre'=>'Fantastique',
                'duree'=>179,
                'annee_sortie'=>2002,
                'synopsis'=>'La communauté de l\'anneau se sépare. Frodon et Sam poursuivent leur route vers la Crevasse du Destin, tandis que les autres membres de la communauté, menés par Aragorn, Gandalf et Legolas, se dirigent vers la forteresse de Rohan pour y trouver de l\'aide. Pendant ce temps, Gollum, qui a toujours l\'anneau, poursuit Frodon et Sam.',
                'image'=>'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcR6nJbgIc4VDmwLzaMo8CLOYiPkpgd5Bdm8EpL9hna4XZggrlit',
                'trailer'=>'https://www.youtube.com/embed/2dlRvAjU_RI',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'titre'=>'The Lord of the Rings: The Return of the King',
                'realisateur'=>'Peter Jackson',
                'genre'=>'Fantastique',
                'duree'=>201,
                'annee_sortie'=>2003,
                'synopsis'=>'Les armées de Sauron ont attaqué Minas Tirith, la capitale du Gondor. Jamais ce royaume autrefois puissant n\'a eu autant besoin de son roi. Cependant, Aragorn trouvera-t-il en lui la volonté d\'accomplir sa destinée ? Tandis que Gandalf s\'efforce de soutenir les forces brisées de Gondor, Théoden exhorte les guerriers de Rohan à se joindre au combat. Cependant, malgré leur courage et leur loyauté, les forces des Hommes ne sont pas de taille à lutter contre les innombrables légions d\'ennemis.',
                'image'=>'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSyhNpJyWkY1BIsQvBwKIdzq6mzWOqQtiyshuNC0Lh5FeLbcZAw',
                'trailer'=>'https://www.youtube.com/embed/r5X-hFf6Bwo',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'titre'=>'Harry Potter and the Philosopher\'s Stone',
                'realisateur'=>'Chris Columbus',
                'genre'=>'Fantastique',
                'duree'=>152,
                'annee_sortie'=>2001,
                'synopsis'=>'Harry Potter, un orphelin de onze ans, vit chez ses odieux oncles et tantes Dursley. Un jour, il reçoit une lettre l\'invitant à rejoindre l\'école de sorcellerie Poudlard. Harry Potter découvre alors qu\'il est un sorcier et qu\'il a été choisi pour intégrer l\'école de sorcellerie Poudlard. Il y fera la connaissance de Ron Weasley et Hermione Granger, ses futurs meilleurs amis, et de son ennemi juré, Draco Malfoy.',
                'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_9nrOnN8sYfZZHJ06EIBSoEO5qjx7uHHEs6VtKNplGVuGhZuC',
                'trailer'=>'https://www.youtube.com/embed/mNgwNXKBEW0',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'titre'=>'Harry Potter and the Chamber of Secrets',
                'realisateur'=>'Chris Columbus',
                'genre'=>'Fantastique',
                'duree'=>161,
                'annee_sortie'=>2002,
                'synopsis'=>'Alors que l\'oncle Vernon, la tante Pétunia et son cousin Dudley reçoivent d\'importants invités à dîner, Harry Potter est contraint de passer la soirée dans sa chambre. Dobby, un elfe, fait alors son apparition.',
                'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTltzcooPkGcy1fKKqzSuO8U6S9XBpNDR9MuYc9SS_L5AbAn66O',
                'trailer'=>'https://www.youtube.com/embed/jBltxS8HfQ4',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'titre'=>'Harry Potter and the Prisoner of Azkaban',
                'realisateur'=>'Alfonso Cuarón',
                'genre'=>'Fantastique',
                'duree'=>142,
                'annee_sortie'=>2004,
                'synopsis'=>'Harry Potter, Ron et Hermione sont de retour à Poudlard pour leur troisième année. Mais un dangereux prisonnier s\'est évadé de la prison d\'Azkaban et se dirige vers le château. Harry Potter et ses amis vont devoir faire face à de nombreux dangers, dont un dangereux prisonnier s\'est évadé de la prison d\'Azkaban et se dirige vers le château.',
                'image'=>'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSkFf3MN_oao6q3gysHpVfJA2lICz2ckgXE2VoKRWEGk0huoKnQ',
                'trailer'=>'https://www.youtube.com/embed/lAxgztbYDbs',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'titre'=>'Harry Potter and the Goblet of Fire',
                'realisateur'=>'Mike Newell',
                'genre'=>'Fantastique',
                'duree'=>157,
                'annee_sortie'=>2005,
                'synopsis'=>'La quatrième année à l\'école de Poudlard est marquée par le Tournoi des trois sorciers. Les participants sont choisis par la fameuse coupe de feu, qui est à l\'origine d\'un scandale. Elle sélectionne Harry Potter tandis qu\'il n\'a pas l\'âge légal requis.',
                'image'=>'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSyXO9PGwU8Y2lv7JONiXLR7jHW4e8PyiCE6lTIVzWrZ8NvKpms',
                'trailer'=>'https://www.youtube.com/embed/QUJNOttpUn8',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'titre'=>'Harry Potter and the Order of the Phoenix',
                'realisateur'=>'Michael Goldenberg',
                'genre'=>'Fantastique',
                'duree'=>138,
                'annee_sortie'=>2007,
                'synopsis'=>'À sa cinquième année à l\'école de sorcellerie de Poudlard, Harry Potter passe pour un illuminé, le ministre de la magie Cornelius Fudge ayant officiellement réfuté les révélations de l\'adolescent et de son directeur, Dumbleore, disant que le terrifiant Lord Voldermort est de retour.',
                'image'=>'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQZ10ZR6pT7zu8NL5SZwy3CD0MT4Na0nthYik3CINP5fBhK1S2I',
                'trailer'=>'https://www.youtube.com/embed/WIj9DYJ5EKk',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'titre'=>'Harry Potter and the Half-Blood Prince',
                'realisateur'=>'David Yates',
                'genre'=>'Fantastique',
                'duree'=>153,
                'annee_sortie'=>2009,
                'synopsis'=>'Cette sixième année scolaire de Harry Potter à l\'école de sorciers commence par une dispute avec son ennemi juré Draco Malfoy, en qui les forces des ténèbres placent désormais leurs espoirs.',
                'image'=>'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSkOhQV4xAUHlp179grxIcLZzu16ojGMNu0O7_Bqibvj6UsI-uk',
                'trailer'=>'https://www.youtube.com/embed/0ubLa8s0YZk',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'titre'=>'Harry Potter and the Deathly Hallows – Part 1',
                'realisateur'=>'David Yates',
                'genre'=>'Fantastique',
                'duree'=>146,
                'annee_sortie'=>2010,
                'synopsis'=>'Sans les conseils et la protection de leurs professeurs, Harry, Ron et Hermione ont pour mission de détruire les horcruxes, les origines de l\'immortalité de Voldemort. Bien que plus que jamais ils doivent compter l\'un sur l\'autre, les forces du mal menacent de les désunir.',
                'image'=>'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTobkzVSJU5oZ9Pv_6bM0_o4RF_zFA9jyNwdHATG90vKxyhOk5x',
                'trailer'=>'https://www.youtube.com/embed/MxqsmsA8y5k',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'titre'=>'Harry Potter and the Deathly Hallows – Part 2',
                'realisateur'=>'David Yates',
                'genre'=>'Fantastique',
                'duree'=>130,
                'annee_sortie'=>2011,
                'synopsis'=>'Dans la deuxième partie de cette finale épique, la bataille entre les forces du bien et celles du mal du monde des magiciens dégénère en une guerre tous azimuts. Les enjeux n\'ont jamais été si grands et personne n\'est en sécurité.',
                'image'=>'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTgXSuLAFerQGZdPCWv8EHI_ucQq6RTl3xf91F4aN54PDA_oCtB',
                'trailer'=>'https://www.youtube.com/embed/5NYt1qirBWg',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            // [
            //     'titre'=>'',
            //     'realisateur'=>'',
            //     'genre'=>'',
            //     'annee_sortie'=>1,
            //     'image'=>'',
            //     'created_at'=> date('Y-m-d H:i:s')
            // ],
        ]);
    }
}
