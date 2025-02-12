<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Department;
use App\Models\Discount;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Electronic;
use App\Models\ElectronicBranch;
use App\Models\Fashion;
use App\Models\FashionBranch;
use App\Models\Fitness;
use App\Models\FitnessBranch;
use App\Models\Food;
use App\Models\FoodBranch;
use App\Models\Gif;
use App\Models\GovOffice;
use App\Models\GovOfficeBranch;
use App\Models\Hospital;
use App\Models\HospitalBranch;
use App\Models\Laboratory;
use App\Models\LaboratoryBranch;
use App\Models\PharmacyBranch;
use App\Models\Shop;
use App\Models\ShopBranch;
use App\Models\ShopProduct;
use App\Models\SubDepartment;
use App\Models\Travel;
use App\Models\TravelBranch;
use App\Models\User;
use App\Models\Pharmacy;
use App\Models\Farmer;
use App\Models\EducationBranch;
use App\Models\Advertisement;
use App\Models\Village;
use Illuminate\Foundation\Testing\RefreshDatabase;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Doctor::factory(10)->create();
        Food::factory(10)->create();
        Electronic::factory(10)->create();
        ElectronicBranch::factory(10)->create();
        Fashion::factory(10)->create();
        FashionBranch::factory(10)->create();
        GovOffice::factory(10)->create();
        Hospital::factory(10)->create();
        Laboratory::factory(10)->create();
        Pharmacy::factory(10)->create();
        FoodBranch::factory(10)->create();
        PharmacyBranch::factory(10)->create();
        GovOfficeBranch::factory(10)->create();
        HospitalBranch::factory(10)->create();
        LaboratoryBranch::factory(10)->create();
        Education::factory(10)->create();
        Farmer::factory(10)->create();
        Fitness::factory(10)->create();
        Travel::factory(10)->create();
        FitnessBranch::factory(10)->create();
        EducationBranch::factory(10)->create();
        TravelBranch::factory(10)->create();
        Advertisement::factory(10)->create();
        Shop::factory(10)->create();
        ShopProduct::factory(10)->create();
        City::factory(10)->create();
        Village::factory(10)->create();
        SubDepartment::factory(10)->create();
        Gif::factory(10)->create();
        Discount::factory(10)->create();
        Department::factory(10)->create();
    }
}
