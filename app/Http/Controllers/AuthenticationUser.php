<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FMS_USERS;
use Illuminate\Support\Facades\DB;

class AuthenticationUser extends Controller
{
    public function logmasuk()
    {
        if(session()->has('authenticatedUser')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function logkeluar()
    {
        session()->forget('authenticatedUser');
        return redirect()->route('logmasuk');
    }

    public function systemLogin($userid, $password)
    {
        dump($userid);
        dd($password);
        $user = FMS_USERS::where('USERID',strtoupper($userid))->first();
        if($user != null)
        {
            $savedpassword = $this->decrypting($user->userpassword);

            if($savedpassword === $user->katalaluan) {
                session()->put('authenticatedUser', [
                    'userid' => $user->userid,
                    'username' => $user->username,
                    'status' => $user->userstatus,
                    'idtype' => $user->idtype,
                ]);

                return redirect()->route('dashboard');
            }
            else {
                return redirect()->route('logmasuk')->with('loginerror', 'Ralat pada Kata Laluan');
            }
        }
        else {
            return redirect()->route('logmasuk')->with('loginerror', 'Akaun tidak wujud atau ralat pada ID');
        }
    }

    public function loggingin(Request $request)
    {
        $user = FMS_USERS::where('USERID',strtoupper($request->idpengguna))->first();

        if($user != null)
        {
            $savedpassword = $this->decrypting($user->userpassword);

            if($savedpassword === $request->katalaluan) {

                /* Join table  to get state_id */
            $user_state = DB::table('FMS_USERS')
             -> select('BANK_OFFICERS.BRANCH_CODE', 'BRANCHES.BRANCH_TYPE' ,'BRANCHES.STATE_CODE' ,'BRANCHES.BRANCH_NAME','BNM_STATECODES.CODE','BNM_STATECODES.DESCRIPTION') //DB::raw('UF_GET_STATE_DESC(SUBSTR(BANK_OFFICERS.BRANCH_CODE,0,2)) AS state'))
            ->join ('BANK_OFFICERS', 'FMS_USERS.USERID', '=', 'BANK_OFFICERS.OFFICER_ID') 
            ->join ('BRANCHES', 'BANK_OFFICERS.BRANCH_CODE', '=', 'BRANCHES.BRANCH_CODE')
            ->join ('BNM_STATECODES','BRANCHES.STATE_CODE','=' , 'BNM_STATECODES.CODE')
            ->where('FMS_USERS.USERID' , '=', $user->userid)
            ->first(); 
             //dd($user_state);

            /* end join table to get state_id */

                session()->put('authenticatedUser', [
                    'userid' => $user->userid,
                    'username' => $user->username,
                    'status' => $user->userstatus,
                    'idtype' => $user->idtype,

                    'branch_code' => $user_state->branch_code,
                    'state_code' => $user_state->state_code,
                    'branch_type' => $user_state->branch_type,
                    'branch_name' => $user_state->branch_name,
                    'state_name' => $user_state->description,
                ]);

                // dd($user_state);
                return redirect()->route('dashboard');
            }
            else {
                return redirect()->route('logmasuk')->with('loginerror', 'Ralat pada Kata Laluan');
            }
        }
        else {
            return redirect()->route('logmasuk')->with('loginerror', 'Akaun tidak wujud atau ralat pada ID');
        }
    }

    private function decrypting($as_encrypted)
    {
        $NUM_SUBKEYS = 18;
        $NUM_S_BOXES = 4;
        $NUM_ENTRIES = 256;
        
        $b = array(1,2,3,4,5,6,7,8,9);
        
        $ls_PA_Init = array ('0x243f6a88', '0x85a308d3', '0x13198a2e', '0x03707344', '0xa4093822', '0x299f31d0',
                            '0x082efa98', '0xec4e6c89', '0x452821e6', '0x38d01377', '0xbe5466cf', '0x34e90c6c',
                            '0xc0ac29b7', '0xc97c50dd', '0x3f84d5b5', '0xb5470917', '0x9216d5d9', '0x8979fb1b' );
        $ls_SB_Init = array(
                1 => array ('0xd1310ba6','0xb8e1afed','0x24a19947','0x636920d8','0x0d95748f','0x7b54a41d','0xc5d1b023','0x8e79dcb0',
                '0xd71577c1','0xe65525f3','0x55ca396a','0xa15486af','0x2ba9c55d','0xafd6ba33','0x3b8f4898','0x61d809cc',
                '0xef845d5d','0x23893e81','0x2e0b4482','0x21c66842','0x6a51a0d2','0x6eef0b6c','0xa1f1651d','0x8cee8619',
                '0xe06f75d8','0x4ed3aa62','0x37d0d724','0x075372c9','0xe3fe501a','0xc1a94fb6','0x68fb6faf','0x6dfc511f',
                '0xbee3d004','0xc0cba857','0x5579c0bd','0x679f25fe','0x3c7516df','0x323db5fa','0x9e5c57bb','0xd542a8f6',
                '0x695b27b0','0x10fa3d98','0x9a53e479','0xe1ddf2da','0xef20cada','0x95dbda4d','0xd08ed1d0','0x8ff6e2fb',
                '0x4fad5ea0','0x2f2f2218','0xe5a0cc0f','0xb4a84fe0','0x165fa266','0xe6ad2065','0xebcdaf0c','0x00250e2d',
                '0x2464369b','0x78c14389','0x83260376','0xb3472dca','0xd60f573f','0x08ba6fb5','0xb6636521','0x53b02d5d',
                '0x4b7a70e9','0xad6ea6b0','0xecaa8c71','0x193602a5','0x3f54989a','0xa1d29c07','0x4cdd2086','0x09686b3f',
                '0x687f3584','0x3e07841c','0xb03ada37','0xae0cf51a','0xd19113f9','0x3ae5e581','0xa9446146','0xe238cd99',
                '0x4e548b38','0x2cb81290','0xde9a771f','0x5512721f','0x7a584718','0xec7aec3a','0xef1c1847','0x12a14d43',
                '0x71dff89e','0x043556f1','0xf28fe6ed','0x86e34570','0x771fe71c','0x803e89d6','0xc6150eba','0xf2f74ea7',
                '0x5223a708','0xe3bc4595','0xc332ddef','0xeecea50f','0x1521b628','0x13cca830','0xb5735c90','0xeecc86bc',
                '0x648b1eaf','0x40685a32','0x9b540b19','0xf837889a','0x0e358829','0x57f584a5','0xcdb30aeb','0x58ebf2ef',
                '0x5d4a14d9','0x45eee2b6','0xc742f442','0xd81e799e','0xcf62a1f2','0x7f1524c3','0x095bbf00','0x58428d2a',
                '0x3372f092','0x7cde3759','0xa6078084','0xa969a7aa','0x9e447a2e','0xdb73dbd3','0xc5c43465','0x153e21e7',
                '0xe93d5a68','0x411520f7','0xd4082471','0x1e39f62e','0x4d95fc1d','0xbfbc09ec','0x96eb27b3','0x28507825',
                '0x68dc1462','0x4f3ffea2','0xaace1e7c','0x20fe9e35','0x1dc9faf7','0x3a6efa74','0xfb0af54e','0x55533a3a',
                '0x55a867bc','0xa62a4a56','0xfdf8e802','0x95c11548','0x07f9c9ee','0x325f51eb','0x257b7834','0x0e12b4c2',
                '0x6b2395e0','0x85b2a20e','0xd0127845','0x5449a36f','0x0a476341','0xa812dc60','0xc67b5510','0xf1290dc7',
                '0x667b9ffb','0xbb132f88','0x37392eb3','0x6842ada7','0x6a124237','0x1a6b1018','0x44421659','0x64af674e',
                '0x9dbc8057','0xd1fd8346','0x83426b33','0x77a057be','0x4e58f48f','0x5366f9c3','0x7aeb2661','0x466e598e',
                '0xb90bace1','0xb77f19b6','0xe85a1f02','0x1ab93d1d','0xdcb7da83','0x50115e01','0x9af88c27','0xf0177a28',
                '0x11e69ed7','0xbbcbee56','0x6f05e409','0x86e3725f','0xed545578','0x1e50ef5e','0x6fd5c7e7','0xd79a3234',
                '0x3a39ce37','0x5cb0679e','0xd5118e9d','0xb78c1b6b','0x5748ab2f','0x530ff8ee','0x2939bbdb','0xa1fad5f0',
                '0xc089c2b8','0x83c061ba','0x2826a2f9','0xc72fefd3','0x80e4a915','0xe990fd5a','0x96d5ac3a','0x1f9f25cf',
                '0xe029ac71','0xe8d3c48d','0x785f0191','0x15056dd4','0xc3eb9e15','0x1b3f6d9b','0x7533d928','0x28517711',
                '0x4de81751','0xea7a90c2','0xa8b6e37e','0xa2ae0810','0xb39a460a','0x5bbef7dd','0xdda26a7e','0x72eacea8',
                '0xd29be463','0x740e0d8d','0x4040cb08','0xe1b00428','0x6f3f3b82','0x611560b1','0xa08839e1','0xe01cc87e',
                '0x1a908749','0x0339c32a','0xf79e59b7','0xbf97222c','0xfae59361','0xb6c1075e','0xe0ec6e0e','0x9f1f9532',
                '0x1b0a7441','0xdf359f8d','0xe54cda54','0x1618b166','0xf523f357','0xacf08162','0xde966292','0xe6c6c7bd',
                '0xc9aa53fd','0x71126905','0x53113ec0','0xba38209c','0x85cbfe4e','0x1948c25c','0x90d4f869','0xb74e6132',),
                
                2 => array ('0x98dfb5ac','0x6a267e96','0xb3916cf7','0x71574e69','0x728eb658','0xc25a59b5','0x286085f0','0x603a180e',
                '0xbd314b27','0xaa55ab94','0x2aab10b6','0x7c72e993','0x741831f6','0x6c24cf5c','0x6b4bb9af','0xfb21a991',
                '0xe98575b1','0xd396acc5','0xa4842004','0xf6e96c9a','0xd8542f68','0x137a3be4','0x39af0176','0x456f9fb4',
                '0x85c12073','0x363f7706','0xd00a1248','0x80991b7b','0xb6794c3b','0x409f60c4','0x3e6c53b5','0x9b30952c',
                '0xde334afd','0x45c8740f','0x1a60320a','0xfb1fa3cc','0xfd616b15','0xfd238760','0xca6f8ca0','0x287effc3',
                '0xbbca58c8','0xfd2183b8','0xb6f84565','0xa4cb7e33','0x36774c01','0xae909198','0xafc725e0','0xf2122b64',
                '0x688fc31c','0xbe0e1777','0xb56f74e8','0xfd13e0b7','0x80957705','0x77b5fa86','0x7b3e89a0','0x2071b35e',
                '0xf009b91e','0xd95a537f','0x6295cfa9','0x7b14a94a','0xbc9bc6e4','0x571be91f','0xe7b9f9b6','0xa99f8fa1',
                '0xb5b32944','0x49a7df7d','0x699a17ff','0x75094c29','0x5b429d65','0xefe830f5','0x8470eb26','0x3ebaefc9',
                '0x52a0e286','0x7fdeae5c','0xf0500c0d','0x3cb574b2','0x7ca92ff6','0x37c2dadc','0x0fd0030e','0x3bea0e2f',
                '0x4f6db908','0x24977c79','0xd9930810','0x2e6b7124','0x7408da17','0xdb851dfa','0x3215d908','0x2a65c451',
                '0x10314e55','0xd7a3c76b','0x97f1fbfa','0xeae96fb1','0x4e3d06fa','0x5266c825','0x94e2ea78','0x361d2b3d',
                '0xf71312b6','0xa67bc883','0xbe6c5aa5','0xdb2f953b','0x29076170','0xeb61bd96','0x4c70a239','0x60622ca7',
                '0x19bdf0ca','0x3c2ab4b3','0x875fa099','0x97e32d77','0xc7e61fd6','0x1b227263','0x532e3054','0x34c6ffea',
                '0xe864b7e3','0xa3aaabea','0xef6abbb5','0x86854dc7','0x5b8d2646','0x69cb7492','0xad19489d','0x0c55f5ea',
                '0x8d937e41','0xcbee7460','0x19f8509e','0xc50c06c2','0xc3453484','0x105588cd','0x713e38d8','0x8fb03d4a',
                '0x948140f7','0x7602d4f7','0x3320f46a','0x97244546','0x96b591af','0x03bd9785','0x55fd3941','0x530429f4',
                '0xd7486900','0xe887ad8c','0xd3375fec','0xd9f385b9','0x4b6d1856','0xdd5b4332','0xd8feb397','0x20838d87',
                '0xa1159a58','0x3f3125f9','0x04272f70','0xe4c66d22','0x41041f0f','0xd59bc0d1','0x602a9c60','0x02e1329e',
                '0x333e92e1','0xe6ba0d99','0x95b794fd','0x877d48fa','0x992eff74','0xa1ebddf8','0x6d672c37','0xcc00ffa3',
                '0xcedb7d9c','0x515bad24','0xcc115979','0xc66a2b3b','0xb79251e7','0x11caedfa','0x0a121386','0xda86a85f',
                '0xf0f7c086','0xf6381fb0','0xf01eab71','0xbde8ae24','0xf2ddfda2','0xc8b38e74','0x8b1ddf84','0x20b45770',
                '0xbb8205d0','0xe0a9dc09','0x09f0be8c','0x0ba5a4df','0x573906fe','0xa70683fa','0x773f8641','0xc0f586e0',
                '0x2338ea63','0x90bcb6de','0x4b7c0188','0x724d9db9','0x08fca5b5','0xb161e6f8','0x56e14ec4','0x92638212',
                '0xd3faf5cf','0x4fa33742','0xbf0f7315','0x21a19045','0xbc946e79','0x468dde7d','0xa9ba4650','0x6a2d519a',
                '0x43242ef6','0x9be96a4d','0xa73a3ae1','0xf752f7da','0x87b08601','0x9e34d797','0x017da67d','0xadf2b89b',
                '0xe019a5e6','0x283b57cc','0xed756055','0x88f46dba','0x3c9057a2','0x1e6321f5','0xb155fdf5','0xc20ad9f8',
                '0x3830dc8e','0xfb3e7bce','0xc3293d46','0xdd6db224','0x6445c0dd','0x1b588d40','0x3a59ff45','0xfa6484bb',
                '0x542f5d9e','0xe75b1357','0x4eb4e2cc','0x95983a1d','0x3520ab82','0xe7933fdc','0x51ce794b','0xbcc7d1f6',
                '0xd44fbd9a','0xc6913667','0x43f5bb3a','0x15e6fc2a','0xceb69ceb','0xe3056a0c','0x1698db3b','0xe0d392df',
                '0x4ba3348c','0x9b992f2e','0x1edad891','0xfd2c1d05','0xa6327623','0x5a75ebb5','0x81b949d0','0x327a140a',
                '0x62a80f00','0xb2040222','0x1640e3d3','0xf746ce76','0x8ae88dd8','0x02fb8a8c','0xa65cdea0','0xce77e25b',),
                3 => array ('0x2ffd72db','0xba7c9045','0x0801f2e2','0xa458fea3','0x718bcd58','0x9c30d539','0xca417918','0x6c9e0e8b',
                '0x78af2fda','0x57489862','0xb4cc5c34','0xb3ee1411','0xce5c3e16','0x7a325381','0xc4bfe81b','0x487cac60',
                '0xdc262302','0x0f6d6ff3','0x69c8f04a','0x670c9c61','0x960fa728','0xba3bf050','0x66ca593e','0x7d84a5c3',
                '0x401a449f','0x1bfedf72','0xdb0fead3','0x25d479d8','0x976ce0bd','0x5e5c9ec2','0x1339b2eb','0xcc814544',
                '0x660f2807','0xd20b5f39','0xd6a100c6','0x8ea5e9f8','0x2f501ec8','0x53317b48','0x1a87562e','0xac6732c6',
                '0xe1ffa35d','0x4afcb56c','0xd28e49bc','0x62fb1341','0xd07e9efe','0xeaad8e71','0x8e3c5b2f','0x8888b812',
                '0xd1cff191','0xea752dfe','0x18acf3d6','0x7cc43b81','0x93cc7314','0xc75442f5','0xd6411bd3','0x226800bb',
                '0x5563911d','0x207d5ba2','0x11c81968','0x1b510052','0x2b60a476','0xf296ec6b','0xff34052e','0x08ba4799',
                '0xdb75092e','0x9cee60b8','0x5664526c','0xa0591340','0x6b8fe4d6','0x4d2d38e6','0x6382e9c6','0x3c971814',
                '0xb79c5305','0x8e7d44ec','0xf01c1f04','0x25837a58','0x94324773','0xc8b57634','0xecc8c73e','0x3280bba1',
                '0x6f420d03','0x5679b072','0xb38bae12','0x501adde6','0xbc9f9abc','0x63094366','0xdd433b37','0x50940002',
                '0x81ac77d6','0x3c11183b','0x9ebabf2c','0x860e5e0a','0x2965dcb9','0x2e4cc978','0xa5fc3c53','0x1939260f',
                '0xebadfe6e','0xb17f37d1','0x65582185','0x2aef7dad','0xecdd4775','0x0334fe1e','0xd59e9e0b','0x9cab5cab',
                '0xa02369b9','0x319ee9d5','0x95f7997e','0x11ed935f','0x96dedfa1','0x9b83c3ff','0x8fd948e4','0xfe28ed61',
                '0x42105d14','0xdb6c4f15','0x654f3b1d','0xe44b476a','0xfc8883a0','0x47848a0b','0x1462b174','0x1dadf43e',
                '0xd65fecf1','0x4085f2a7','0xe8efd855','0x5a04abfc','0xfdd56705','0x675fda79','0x3d28f89e','0xe6e39f2b',
                '0xf64c261c','0xbcf46b2e','0x43b7d4b7','0x14214f74','0x70f4ddd3','0x7fac6dd0','0xda2547e6','0x0a2c86da',
                '0x680ec0a4','0xb58ce006','0xce78a399','0xee39d7ab','0x26a36631','0x6841e7f7','0x454056ac','0xfe6ba9b7',
                '0xcca92963','0x5ef47e1c','0x80bb155c','0x48c1133f','0x404779a4','0xf2bcc18f','0xdff8e8a3','0xaf664fd1',
                '0x3b240b62','0xde720c8c','0x647d0862','0xc39dfd27','0x3a6f6eab','0x991be14c','0x2765d43b','0xb5390f92',
                '0xa091cf0b','0x7b9479bf','0x8026e297','0x12754ccc','0x06a1bbe6','0x3d25bdd8','0xd90cec6e','0xbebfe988',
                '0x60787bf8','0x7745ae04','0xb0804187','0x55464299','0xf474ef38','0xb475f255','0x846a0e79','0x8cd55591',
                '0x11a86248','0x662d09a1','0x4a99a025','0xa186f20f','0xa1e2ce9b','0xa002b5c4','0xc3604c06','0x006058aa',
                '0x53c2dd94','0xebfc7da1','0x39720a3d','0x1ac15bb4','0xd83d7cd3','0xa28514d9','0x362abfce','0x670efa8e',
                '0xabc27737','0xd3822740','0xd62d1c7e','0xb26eb1be','0xc6a376d2','0xd5730a1d','0xac9526e8','0x63ef8ce2',
                '0xa51e03aa','0x8fe51550','0x4ba99586','0x3f046f69','0x9b09e6ad','0x2cf0b7d9','0xd1cf3ed6','0x5ad6b472',
                '0x47b0acfd','0xf8d56629','0xf7960e44','0x03a16125','0x97271aec','0xf59c66fb','0x03563482','0xabcc5167',
                '0x379d5862','0x5121ce64','0x48de5369','0x69852dfd','0x586cdecf','0xccd2017f','0x3e350a44','0x8d6612ae',
                '0xaec2771b','0xf8721671','0x34d2466a','0x06b89fb4','0x011a1d4b','0xbb3a792b','0x2f32c9b7','0xcf0111c3',
                '0xd0dadecb','0x8df9317c','0xf2d519ff','0x0f91fc71','0xc2a86459','0x10d25065','0x4c98a0be','0xd3a0342b',
                '0xc5be7120','0xe60b6f47','0xce6279cf','0x848fd2c5','0x93a83531','0x6e163697','0x4c50901b','0x45e1d006',
                '0xbb25bfe2','0xb6cbcf7c','0x38abbd60','0x77afa1c5','0x7aaaf9b0','0x01c36ae4','0x3f09252d','0x578fdfe3',),
                4 => array('0xd01adfb7','0xf12c7f99','0x858efc16','0xf4933d7e','0x82154aee','0x2af26013','0xb8db38ef','0xb01e8a3e',
                '0x55605c60','0x63e81440','0x1141e8ce','0x636fbc2a','0x9b87931e','0x28958677','0x66282193','0x5dec8032',
                '0xeb651b88','0x83f44239','0x9e1f9b5e','0xabd388f0','0xab5133a3','0x7efb2a98','0x82430e88','0x3b8b5ebe',
                '0x56c16aa6','0x429b023d','0x49f1c09b','0xf6e8def7','0x04c006ba','0x196a2463','0x3b52ec6f','0xaf5ebd09',
                '0x192e4bb3','0xb9d3fbdb','0x402c7279','0xdb3222f8','0xad0552ab','0x3e00df82','0xdf1769db','0x8c4f5573',
                '0xb8f011a0','0x2dd1d35b','0x4bfb9790','0xcee4c6e8','0x2bf11fb4','0x6b93d5a0','0x8e7594b7','0x900df01c',
                '0xb3a8c1ad','0x8b021fa1','0xce89e299','0xd2ada8d9','0x211a1477','0xfb9d35cf','0xae1e7e49','0x57b8e0af',
                '0x59dfa6aa','0x02e5b9c5','0x4e734a41','0x9a532915','0x81e67400','0x2a0dd915','0xc5855664','0x6e85076a',
                '0xc4192623','0x8fedb266','0xc2b19ee1','0xe4183a3e','0x99f73fd6','0xf0255dc1','0x021ecc5e','0x6b6a70a1',
                '0xaa500737','0x5716f2b8','0x0200b3ff','0xdc0921bd','0x22f54701','0x9af3dda7','0xa4751e41','0x183eb331',
                '0xf60a04bf','0xbcaf89af','0xdccf3f2e','0x9f84cd87','0xe94b7d8c','0xc464c3d2','0x24c2ba16','0x133ae4dd',
                '0x5f11199b','0x5924a509','0x1e153c6e','0x5a3e2ab3','0x99e71d0f','0x9c10b36a','0x1e0a2df4','0x19c27960',
                '0xeac31f66','0x018cff28','0x68ab9802','0x5b6e2f84','0x619f1510','0xaa0363cf','0xcbaade14','0xb2f3846e',
                '0x655abb50','0xc021b8f7','0x623d7da8','0x16681281','0x7858ba99','0x1ac24696','0x6dbc3128','0xee7c3c73',
                '0x203e13e0','0xfacb4fd0','0x41cd2105','0x3d816250','0xc1c7b6a3','0x5692b285','0x23820e00','0x233f7061',
                '0x6c223bdb','0xce77326e','0x61d99735','0x800bcadc','0x0e1e9ec9','0xe3674340','0xf16dff20','0xdb83adf7',
                '0x94692934','0xd4a20068','0x500061af','0xbf8b8840','0x66a02f45','0x31cb8504','0xabca0a9a','0xe9b66dfb',
                '0x27a18dee','0x7af4d6b6','0x406b2a42','0x3b124e8b','0xeae397b2','0xca7820fb','0xba489527','0xd096954b',
                '0x99e1db33','0x9029317c','0x05282ce3','0xc70f86dc','0x5d886e17','0x41113564','0x1f636c1b','0xcad18115',
                '0xeebeb922','0x2da2f728','0xe7ccf5f0','0xf33e8d1e','0xf4f8fd37','0xdb6e6b0d','0xdcd0e804','0x690fed0b',
                '0xd9155ea3','0x763bd6eb','0xf42e312d','0x782ef11c','0x4bfb6350','0xe2e1c3c9','0xd5abea2a','0x64e4c3fe',
                '0x6003604d','0xd736fccc','0x3c005e5f','0xbf582e61','0x8789bdc2','0x46fcd9b9','0x915f95e2','0xc902de4c',
                '0x7574a99e','0xc4324633','0x1d6efe10','0x2868f169','0x4fcd7f52','0x0de6d027','0x61a806b5','0x30dc7d62',
                '0xc2c21634','0xce591d76','0x7c927c24','0xd39eb8fc','0x4dad0fc4','0x6c51133c','0xddc6c837','0x406000e0',
                '0x5ac52d1b','0x99bc9bbe','0xc700c47b','0x6a366eb4','0x6549c2c8','0x4cd04dc6','0xbe5ee304','0x9a86ee22',
                '0x9cf2d0a4','0xba645bd6','0xef5562e9','0x77fa0a59','0x3b3ee593','0x022b8b51','0x7c7d2d28','0x5a88f54c',
                '0xed93fa9b','0x79132e28','0xe3d35e8c','0x0564f0bd','0xa93a072a','0x26dcf319','0x8aba3cbb','0xccad925f',
                '0x9320f991','0x774fbe32','0x6413e680','0x09072166','0x1c20c8ae','0x6bb4e3bb','0xbcb4cdd5','0xbf3c6f47',
                '0xf64e6370','0xaf537d5d','0x0115af84','0xce6ea048','0x277227f8','0x344525bd','0xa01fbac9','0xa1e8aac7',
                '0xd50ada38','0xe0b12b4f','0x27d9459c','0x9b941525','0x12baa8d1','0xcb03a442','0x3278e964','0x8971f21e',
                '0xc37632d8','0x0fe3f11d','0xcd3e7e6f','0xf6fb2299','0x56cccd02','0x88d273cc','0x71c65614','0xc3f27b9a',
                '0x35bdd2f6','0xcd769c2b','0x2547adf0','0x20756060','0x4cf9aa7e','0xd6ebe1f9','0xc208e69f','0x3ac372e6',));
                            
        $IS_KEY      = "StuDioWreck";
        
        $keyPtr     = 1;
        $arraynum    = 1;
        $keyLen     = strlen($IS_KEY);
        $tempKey    = ord($keyLen);
        
        $ls_lenVal    = substr($as_encrypted, 0, 10);
        $tempStr    = chr($this->of_gen_key($ls_lenVal, 1, $tempKey, $ls_SB_Init));
        $sourceLen    = intval($tempStr);

        $sourcePtr    = 11;
        
        $ls_p = array();
        
        $ls_retVal = '';
        
        for ($a = 1; $a <= $sourceLen; $a++) {
            $num        = $keyLen - $keyPtr + 1;
            $tempKey     = ord(substr($IS_KEY, -$num));
            $ls_p[$a]    = substr($as_encrypted, $sourcePtr-1, 10);
            if ($arraynum > 4 ) {
                $arraynum = 1;
                }
            
            $tempVal    = chr($this->of_gen_key($ls_p[$a], $arraynum, $tempKey, $ls_SB_Init)) ;
            $ls_retVal    = $ls_retVal . $tempVal;
            $sourcePtr    = $sourcePtr + 10;
            $keyPtr++;
            $arraynum++;
        }
        
        return $ls_retVal;
    }

    private function of_gen_key ($as_code, $ai_num, $ai_tempkey, $is_SB){
        $a = 0;
        $b = 0;
        do {
            $a++;
    
            if ($a >= 256) {
                break;
            } else {
                if ($ai_num > 4) {
                    $ai_num = 1;
                }
                if ($as_code == $is_SB[$ai_num][$a]) {
                    break;
                }
            }
        } while ($a <= 255);
        
        $li_returnVal = $a + 1;
        $li_returnVal -= $ai_tempkey;
        $li_returnVal = $this->of_get_ASCII(0, $li_returnVal);
        
        return $li_returnVal;
    }

    private function of_get_ASCII ($as_mode, $as_code){
        if ($as_mode = 1) {
            do {
                if ($as_code > 255) {
                    $as_code = $as_code - 255;
                }
            } while ($as_code > 255);
        }
        
        if ($as_mode = 0){
            do {
                if ($as_code < 0) {
                    $as_code = $as_code + 255;
                }
            } while ($as_code < 0);
        }
        
        return $as_code;
    }
}
