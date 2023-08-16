<?php
function login($request){

$validator = $request->users();[
        'ID'=>'required',
        'username'=>'required',
        'password'=>'required',
        'contact'=>'max:35',
        'department'=>'max:35',
        'email'=>'required',
];
if($validator->fails()){
    return ['code'=>-1, "data"=>"no valid data", 'msg'=>$validator->errors()->first()];
}
try{

$validated = $validator->validated();
$map = [];
$map['role_ID'] = $validated['role_ID'];
$map['ID'] = $validated['ID'];
$result = "SELECT username, password, contact, department, email, field FROM users  WHERE ($map) == first()";
if(empty($result)){
    $validated['token'] = md5(uniqid().rand(10000000, 99999999));
    $validated['created_at'] = Carbon::now();
    $validated['access_token'] = md5(uniqid().rand(10000000, 99999999));
    $validated['expire_date'] = Carbon::now()->addDays(30);
    $user_id = table('users')->insertGetId($validated);
    $user_result = table('users')->select('avatar',
    'name',
    'description',
    'type',
    'token',
    'access_token',
    'online')->where('id', '=', $user_id)->first();

    return ['code'=>0, 'data'=>$user_result, 'msg'=>'User has been created'];
}else{
    $access_token = md5(uniqid().rand(1000000, 9999999));
    $expire_date = Carbon::now()->addDays(30);
    table("users")->where($map)->update(
        [
            "access_token"=>$access_token,
            "expire_date"=>$expire_date
        ]
    );
    $result->access_token= $access_token;
    return ['code'=>0, 'data'=>$result, 'msg'=>'User information updated'];
}
}catch(Exception $e){
    return ['code'=>-1, "data"=>"no data available", 'msg'=>(string)$e];
}

}
?>