<?php

namespace Database\Seeders;

use App\Models\Catalogos\Etnia\Lengua;
use Illuminate\Database\Seeder;

class LenguaSeeder extends Seeder
{
    public function run(): void
    {
        $lenguas = [
            "AMUZGO",
            "CAKCHIQUEL",
            "CASTELLANO",
            "CHATINO",
            "CHICHIMECA JONAZ",
            "CHINANTECO",
            "CHINANTECO DE LALANA",
            "CHINANTECO DE OJITLAN",
            "CHINANTECO DE PETLAPA",
            "CHINANTECO DE USILA",
            "CHINANTECO DE VALLE NACIONAL",
            "CHOCHO",
            "CHOL",
            "CHONTAL DE OAXACA",
            "CHONTAL DE TABASCO",
            "CHUJ",
            "COCHIMI",
            "CORA",
            "CUCAPA",
            "CUICATECO",
            "GUARIJIO",
            "HUASTECO",
            "HUAVE",
            "HUICHOL",
            "IXCATECO",
            "IXIL",
            "JACALTECO",
            "KANJOBAL",
            "KEKCHI",
            "KICAPU",
            "KILIWA",
            "KUMIAI",
            "LACANDON",
            "MAME",
            "MATLATZINCA",
            "MAYA",
            "MAYO",
            "MAZAHUA",
            "MAZATECO",
            "MIXE",
            "MIXTECA",
            "MIXTECO",
            "MIXTECO DE LA COSTA",
            "MIXTECO DE LA MIXTECA ALTA",
            "MIXTECO DE LA MIXTECA BAJA",
            "MIXTECO DE LA ZONA MAZATECA",
            "MIXTECO DE PUEBLA",
            "MOTOCINTLECO",
            "NAHUATL O MEXICANO",
            "OCUILTECO O TLAHUICA",
            "OPATA",
            "OTOMI",
            "PAIPAI",
            "PAME",
            "PAPABUCO",
            "PAPAGO",
            "PIMA",
            "POPOLOCA",
            "POPOLUCA",
            "POPOLUCA DE LA SIERRA",
            "PUREPECHA O TARASCO",
            "QUICHE",
            "SERI",
            "SOLTECO",
            "TACUATE",
            "TARAHUMARA",
            "TEPEHUA",
            "TEPEHUANO",
            "TLAPANECO",
            "TOJOLABAL",
            "TOTONACA",
            "TRIQUI",
            "TZELTAL",
            "TZOTZIL",
            "YAQUI",
            "ZAPOTECA",
            "ZAPOTECO DE CUIXTLA",
            "ZAPOTECO DE IXTLAN",
            "ZAPOTECO DEL ISTMO",
            "ZAPOTECO DEL RINCON",
            "ZAPOTECO SUREÑO",
            "ZAPOTECO VIJANO",
            "ZAPOTECO VILLISTA",
            "ZOQUE"
        ];

        foreach ($lenguas as $lengua) {
            Lengua::create([
                'nombre' => $lengua
            ]);
        }
    }
}
