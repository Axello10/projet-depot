- authentication *

client
deposit
emptie
entrie
giveback
grade
role
sortie
vendor



- autorization pour les utilisateur *
- roles *
- CRUD vendor, product


ajouter une colonne pour le prix d'entree, et le prix de sortie
prix total entree,
prix total sortiie

pour les dettes ajouter le prix manuelement.

il ya une sortie simple et simple vers les client connus!



quand on creer un nouveau depot directement on creer un vendeur ou fournisseur ou corespondant et aussi l'ajoute dans la liste des client!



stocker la photo d'utilisateur!!!! ou mettre une par defaut!


product model devrait avoir une colonne quantité qui contient le nombre de casier de chaque produit dans le stock, et a chaque entree ou sortie on met a jour le model product en ajoutant ou retirant des casier!






























pour mettre a jour un produit il faut saisir le nombre a augmenter ou soustraire puis faire l'action.




un employee est d'abord un user mais avec:
    -un salaire
    -un adress

voir les action, le depot appartenant, son role dans le sys





a chaque sortie marque comme non payes il faut le mettre dans une table a part

creer un sortie avec status non payer!


regroupe les elements par mois ou anne

groupBy(function($val) {
                    return Carbon::parse($val->created_at)->format('Y');
                });