<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('condem', function (Blueprint $table) {
            $table->id('condemID');
            $table->integer('modelID');
            $table->float('Vk 40 min');
            $table->float('Vk 40 max');
            $table->float('Vk 40 border');
            $table->float('Vk 40 per');
            $table->string('Vk 40 ket');
            $table->float('Vk 100 min');
            $table->float('Vk 100 max');
            $table->float('Vk 100 border');
            $table->float('Vk 100 per');
            $table->string('Vk 100 ket');
            $table->float('Oxi min');
            $table->float('Oxi max');
            $table->float('Oxi border');
            $table->float('Oxi per');
            $table->string('Oxi ket');
            $table->float('P min');
            $table->float('P max');
            $table->float('P border');
            $table->float('P per');
            $table->string('P ket');
            $table->float('Wt min');
            $table->float('Wt max');
            $table->float('Wt border');
            $table->float('Wt per');
            $table->string('Wt ket');
            $table->float('Zn min');
            $table->float('Zn max');
            $table->float('Zn border');
            $table->float('Zn per');
            $table->string('Zn ket');
            $table->float('Soot min');
            $table->float('Soot max');
            $table->float('Soot border');
            $table->float('Soot per');
            $table->string('Soot ket');
            $table->float('Nit min');
            $table->float('Nit max');
            $table->float('Nit border');
            $table->float('Nit per');
            $table->string('Nit ket');
            $table->float('TAN min');
            $table->float('TAN max');
            $table->float('TAN border');
            $table->float('TAN per');
            $table->string('TAN ket');
            $table->float('Ca min');
            $table->float('Ca max');
            $table->float('Ca border');
            $table->float('Ca per');
            $table->string('Ca ket');
            $table->float('Fu min');
            $table->float('Fu max');
            $table->float('Fu border');
            $table->float('Fu per');
            $table->string('Fu ket');
            $table->float('TBN min');
            $table->float('TBN max');
            $table->float('TBN border');
            $table->float('TBN per');
            $table->string('TBN ket');
            $table->float('Ag min');
            $table->float('Ag max');
            $table->float('Ag border');
            $table->float('Ag per');
            $table->string('Ag ket');
            $table->float('Sn min');
            $table->float('Sn max');
            $table->float('Sn border');
            $table->float('Sn per');
            $table->string('Sn ket');
            $table->float('Pb min');
            $table->float('Pb max');
            $table->float('Pb border');
            $table->float('Pb per');
            $table->string('Pb ket');
            $table->float('Fe min');
            $table->float('Fe max');
            $table->float('Fe border');
            $table->float('Fe per');
            $table->string('Fe ket');
            $table->float('Cu min');
            $table->float('Cu max');
            $table->float('Cu border');
            $table->float('Cu per');
            $table->string('Cu ket');
            $table->float('Cr min');
            $table->float('Cr max');
            $table->float('Cr border');
            $table->float('Cr per');
            $table->string('Cr ket');
            $table->float('Al min');
            $table->float('Al max');
            $table->float('Al border');
            $table->float('Al per');
            $table->string('Al ket');
            $table->float('Si min');
            $table->float('Si max');
            $table->float('Si border');
            $table->float('Si per');
            $table->string('Si ket');
            $table->float('Na min');
            $table->float('Na max');
            $table->float('Na border');
            $table->float('Na per');
            $table->string('Na ket');
            $table->float('PI min');
            $table->float('PI max');
            $table->float('PI border');
            $table->float('PI per');
            $table->string('PI ket');
            $table->float('TI min');
            $table->float('TI max');
            $table->float('TI border');
            $table->float('TI per');
            $table->string('TI ket');
            $table->float('Sulf min');
            $table->float('Sulf max');
            $table->float('Sulf border');
            $table->float('Sulf per');
            $table->string('Sulf ket');
            $table->float('Mg min');
            $table->float('Mg max');
            $table->float('Mg border');
            $table->float('Mg per');
            $table->string('Mg ket');
            $table->float('Mo min');
            $table->float('Mo max');
            $table->float('Mo border');
            $table->float('Mo per');
            $table->string('Mo ket');
            $table->float('NAS 1638 min');
            $table->float('NAS 1638 max');
            $table->float('NAS 1638 border');
            $table->float('NAS 1638 per');
            $table->string('NAS 1638 ket');
            $table->float('V min');
            $table->float('V max');
            $table->float('V border');
            $table->float('V per');
            $table->string('V ket');
            $table->float('FP COC min');
            $table->float('FP COC max');
            $table->float('FP COC border');
            $table->float('FP COC per');
            $table->string('FP COC ket');
            $table->float('Wt D 95 min');
            $table->float('Wt D 95 max');
            $table->float('Wt D 95 border');
            $table->float('Wt D 95 per');
            $table->string('Wt D 95 ket');
            $table->float('Wt KF min');
            $table->float('Wt KF max');
            $table->float('Wt KF border');
            $table->float('Wt KF per');
            $table->string('Wt KF ket');
            $table->float('Gly min');
            $table->float('Gly max');
            $table->float('Gly border');
            $table->float('Gly per');
            $table->string('Gly ket');
            $table->float('TBN_D4739 min');
            $table->float('TBN_D4739 max');
            $table->float('TBN_D4739 border');
            $table->float('TBN_D4739 per');
            $table->string('TBN_D4739 ket');
            $table->float('PP min');
            $table->float('PP max');
            $table->float('PP border');
            $table->float('PP per');
            $table->string('PP ket');
            $table->float('Ni min');
            $table->float('Ni max');
            $table->float('Ni border');
            $table->float('Ni per');
            $table->string('Ni ket');
            $table->float('B min');
            $table->float('B max');
            $table->float('B border');
            $table->float('B per');
            $table->string('B ket');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('condem');
    }
};
