<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function rent(){
        return $this->hasMany(Rent::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function importToDB(){
        $path=resource_path('pending-uploads/*.csv');
        $g=glob($path);
       
        foreach(array_slice($g,0,1) as $file){
            $data=array_map('str_getcsv',file($file));
            
            foreach($data as $row){
                $exists=self::with('room')->where('room_id',$row['4'])->get();
                
                $room_exists=Room::where('id',$row['4'])->value('status');//0 or 1
                  
                // dd($room_exists);
                if(count($exists)>0){
                    unlink($file);
                    return 'The room code '.$row['4'].' is already occupied by tenant '.$exists[0]->name.'. Please change and upload the file again. Ensure you enter room codes which are vacant in status.' ;
                }elseif($room_exists==null){
                    unlink($file);
                    return 'You have entered a room code which doesn`t exist please cross check your file and upload again';
                }else{
                    self::Create([
                        'name'=>$row['0'],
                        'mobile'=>$row['1'],
                        'naid'=>$row['2'],
                        'gender'=>$row['3'],
                        'status'=>1,
                        'property_id'=>config('settings.default_property')==null ? '' : config('settings.default_property')->id,
                        'room_id'=>$row['4']
                    ]);
                    
                        Room::where('id',$row['4'])->update(['status'=>'Occupied']);
                    
                }
                
            }
            unlink($file);
        }
        return 'Your file upload was successful. Please confirm the details in the tenants page.';
    }
}
