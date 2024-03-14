<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Catalogos\ColorCabello::insert([
            ["colorcabellos" => "ALBINO"],
            ["colorcabellos" => "CANO"],
            ["colorcabellos" => "CASTAÑO CLARO"],
            ["colorcabellos" => "CASTAÑO OSCURO"],
            ["colorcabellos" =>"ENTRECANO"],
            ["colorcabellos"=>"NEGRO"],
            ["colorcabellos"=>"PELIRROJO"],
            ["colorcabellos"=>"RUBIO"],
            ["colorcabellos"=>"TEÑIDO"],
            ["colorcabellos"=>"NO ESPECIFICA"]
        ]);

        \App\Models\Catalogos\ColorOjos::insert([
            ["color" => "AZULES"],
            ["color" => "CAFÉS CLAROS"],
            ["color" => "CAFÉS OSCUROS"],
            ["color" => "GRISES"],
            ["color" => "MIEL O ÁMBAR"],
            ["color" => "NEGROS"],
            ["color" => "VERDES"],
            ["color" => "NO ESPECIFICA"] 
        ]);

        \App\Models\Catalogos\TamanoOjos::insert([
            ["tamano" => "GRANDES"],
            ["tamano" => "MEDIANOS"],
            ["tamano" => "PEQUEÑOS"],
            ["tamano" => "NO ESPECIFICA"],
        
        ]);

        \App\Models\Catalogos\ColorPiel::insert([
            ["colorpiel" => "ALBINA"],
            ["colorpiel" => "AMARILLA"],
            ["colorpiel" => "BLANCA"],
            ["colorpiel" => "MORENA"],
            ["colorpiel" =>"MORENA CLARA"],
            ["colorpiel"=>"MORENA OSCURA"],
            ["colorpiel"=>"NEGRA"],
            ["colorpiel"=>"NO ESPECIFICA"],
          
        ]);
        \App\Models\Catalogos\TipoCabello::insert([
            ["tipocabello"=>"AFRO +"],
            ["tipocabello"=>"CHINO +"],
            ["tipocabello"=>"CRESPO"],
            ["tipocabello"=>"LACIO"],
            ["tipocabello"=>"ONDULADO"],
            ["tipocabello"=>"RIZADO"],
            ["tipocabello"=>"SEMIONDULADO"],
            ["tipocabello"=>"NO ESPECIFICA"]
          
        ]);

        \App\Models\Catalogos\TipoLabios::insert([
            ["tipolabios"=>"DELGADOS"],
            ["tipolabios"=>"GRUESOS"],
            ["tipolabios"=>"MEDIANOS"],
            ["tipolabios"=>"MIXTOS"],
            ["tipolabios"=>"NO ESPECIFICA"],
        ]);

        \App\Models\Catalogos\TipoNariz::insert([
            ["tiponariz"=>"AGUILEÑA"],
            ["tiponariz"=>"CHATA"],
            ["tiponariz"=>"RECTA"],
            ["tiponariz"=>"NO ESPECIFICA"],
            
        ]);

        \App\Models\Catalogos\TamanoOrejas::insert([
            ["tamanoorejas"=>"CHICAS"],
            ["tamanoorejas"=>"GRANDES"],
            ["tamanoorejas"=>"MEDIANAS"],
            ["tamanoorejas"=>"NO ESPECIFICA"],
            
        ]);

        \App\Models\Catalogos\Complexion::insert([
            ["complexion"=>"ATLÉTICA"],
            ["complexion"=>"DELGADA"],
            ["complexion"=>"OBESA"],
            ["complexion"=>"REGULAR"],
            ["complexion"=>"ROBUSTA"],
            ["complexion"=>"NO ESPECIFICA"],
            
        ]);

        \App\Models\Catalogos\Religion::insert([
            ["religion"=>"Católicos"],
            ["religion"=>"Catolicos Ortodoxos"],
            ["religion"=>"Anabautista/Menonita"],
            ["religion"=>"Anglicano/Episcopal"],
            ["religion"=>"Bautista"],
            ["religion"=>"Luterana"],
            ["religion"=>"Metodista"],
            ["religion"=>"Testigos de jehova"],
            ["religion"=>"Cristianos"],
            ["religion"=>"Evangelicos"],
            ["religion"=>"Pentecostales"],
            ["religion"=>"Protestantes"],
            ["religion"=>"Judaismo"],
            ["religion"=>"Islamismo"],
            ["religion"=>"Budismo"],
            ["religion"=>"Hinduismo"],
            ["religion"=>"Otras de origen oriental"],
            
        ]);
        
        \App\Models\Catalogos\Lengua::insert([
            ["lengua"=>"Nahualt"],
            ["lengua"=>"Paipai"],
            ["lengua"=>"Kiliwa"],
            ["lengua"=>"Cucapa"],
            ["lengua"=>"Cochini"],
            ["lengua"=>"Kumiai"],
            ["lengua"=>"Seri"],
            ["lengua"=>"Chontal de Oaxaca"],
            ["lengua"=>"Chinanteco"],
            ["lengua"=>"Chinanteco Ojitlan"],
            ["lengua"=>"Chinanteco de Usila"],
            ["lengua"=>"Chinanteco de Quiotepec"],
            ["lengua"=>"Chinanteco de Yolox"],
            ["lengua"=>"Chinanteco de Palantla"],
            ["lengua"=>"Chinanteco de Valle Nacional"],
            ["lengua"=>"Chinanteco de Lalana"],
            ["lengua"=>"Chinanteco de Latani"],
            ["lengua"=>"Chinanteco de Petlapa"],
            ["lengua"=>"Pame"],
            ["lengua"=>"Chichimeca Jonaz"],
            ["lengua"=>"Otomi"],
            ["lengua"=>"Mazahua"],
            ["lengua"=>"Matlatzinca"],
            ["lengua"=>"Español"],
            
            
        ]);

        \App\Models\Catalogos\GrupoEtnico::insert([
            ["grupoetnico"=>"NAHUAS"],
            ["grupoetnico"=>"TOTONACAS"],
            ["grupoetnico"=>"HUASTECO"],
            ["grupoetnico"=>"POPOLUCAS"],
            ["grupoetnico"=>"TEPEHUAS"],
            ["grupoetnico"=>"OTOMIES"],
            ["grupoetnico"=>"ZOQUE"],
            ["grupoetnico"=>"MIXES"],
            
        ]);

        \App\Models\Catalogos\Vestimenta::insert([
            ["vestimenta"=>"HUIPIL"],
            ["vestimenta"=>"CALZÓN DE MANTA"],
            ["vestimenta"=>"SARAPE"],
            ["vestimenta"=>"HIPIL"],
            ["vestimenta"=>"JUBÓN"],
            ["vestimenta"=>"ENREDO"],
            ["vestimenta"=>"PICOTE"],
            ["vestimenta"=>"REBOZO"],
            
        ]);
        

        \App\Models\Catalogos\Ascendencia::insert([
            ["ascendencia"=>"AFROAMERICANO"],
            ["ascendencia"=>"ESPAÑOLA"],
            ["ascendencia"=>"MEXICANA"],
            ["ascendencia"=>"EUROPEA"],
            ["ascendencia"=>"INDIGENA"],
            ["ascendencia"=>"MIXTA"],
            ["ascendencia"=>"AMERICANA"],
            ["ascendencia"=>"ASIATICA"],
            
        ]);
    }
}
