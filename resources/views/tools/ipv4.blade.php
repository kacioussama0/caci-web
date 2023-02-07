@extends('layouts.app')
@section('title','ipv4 calculatrice')


@section('content')



    <!--==========================-->
    <!--=         Banner         =-->
    <!--==========================-->
    <section class="page-banner style-light">


        <ul class="banner-pertical-two">
            <li><img src="{{asset('media/banner/header2/tree.png')}}" class="littleSquare" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/wave.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/bigc.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/dot.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/c1.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/dotsm.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/c2.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/hc1.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('media/banner/header2/hc2.png')}}" alt="astriol pertical"></li>
        </ul>
        <!-- /.banner-pertical -->

        <div class="page-title-wrapper text-center">
            <h1 class="page-title">IPV4 Calculatrice</h1>
        </div>
        <!-- /.page-title-wrapper -->

    </section>
    <!-- /.page-banner -->

    <div class="container py-5">
        <div class="ipv4">

            <label for="addresse" class="form-label mt-5 d-block">Addresse IPV4</label>
            <div class="input-group input-group-sm mb-5">
                <input type="number" min="0" id="addresse" max="255" class="form-control ip" id="one" placeholder="0">
                <div class="input-group-append">
                    <span class="input-group-text">.</span>
                </div>
                <input type="number" min="0" max="255" class="form-control ip"  id="two" placeholder="0">
                <div class="input-group-append">
                    <span class="input-group-text">.</span>
                </div>
                <input type="number"  min="0" max="255" class="form-control ip"  id="three" placeholder="0">
                <div class="input-group-append">
                    <span class="input-group-text">.</span>
                </div>
                <input type="number"  min="0" max="255" class="form-control ip" id="four" placeholder="0">
                <div class="input-group-append">
                    <span class="input-group-text ">/</span>
                </div>
                <input type="number"   min="0" max="32" class="form-control" id="five" placeholder="24">
            </div>

            <div class="result my-5 row text-center text-md-left">

                <div class="mask mb-3 col-md-6">
                    <h3>Masque sous réseau :</h3>
                    <span>0.0.0.0</span>
                </div>

                <div class="add-network mb-3 col-md-6">
                    <h3>Address de réseau :</h3>
                    <span>0.0.0.0</span>
                </div>

                <div class="add-broadcast mb-3 col-md-6">
                    <h3>Address de diffusion :</h3>
                    <span>0.0.0.0</span>
                </div>

                <div class="count-machines mb-3 col-md-6">
                    <h3>Nombre Des Machines :</h3>
                    <span>0</span>
                </div>


                <div class="first-machine mb-3 col-md-6">
                    <h3>Premier Machine :</h3>
                    <span>0.0.0.0</span>
                </div>


                <div class="last-machine mb-3 col-md-6">
                    <h3>Dernier Machine :</h3>
                    <span>0.0.0.0</span>
                </div>


                <div class="classe col-md-6">
                    <h3>Classe :</h3>
                    <span>Vide</span>
                </div>


            </div>


                <button class="btn btn-success d-block w-100 mb-3 calc">Calculer</button>
                <button class="btn btn-danger w-100 reset">Reset</button>

        </div>

@endsection

@section('scripts')

            <script>
                let five = document.querySelector('#five');
                let inputs = document.querySelectorAll('.ip');
                let is_valid = false;
                let btn = document.querySelector('.calc');
                let reset = document.querySelector('.reset');
                let Mask = document.querySelector('.mask span');
                let addNetwork = document.querySelector('.add-network span');
                let addBroadcast = document.querySelector('.add-broadcast span');
                let firstMachine = document.querySelector('.first-machine span');
                let countMachines = document.querySelector('.count-machines span');
                let lastMachine = document.querySelector('.last-machine span');
                let classe = document.querySelector('.classe span')
                let temp;

                inputs.forEach(element => {
                    element.onblur = function () {
                        is_valid = validate(element,0,255)
                    }
                });

                five.onblur = ()=> {
                    is_valid = validate(five,0,32)
                }



                function validate(input,from,to) {
                    if(!((input.value >= from) && (input.value <= to)) || input.value == '') {
                        input.classList.add('is-invalid');
                        return false;
                    }

                    input.classList.remove('is-invalid');
                    return true;
                }



                btn.onclick = ()=> {

                    inputs.forEach(element => {
                        is_valid = validate(element,0,255)
                    });

                    is_valid = validate(five,0,32)

                    if(is_valid) {
                        Mask.innerHTML = mask(five.value);
                        addNetwork.innerHTML = addressNet(
                            [
                                inputs[0].value,
                                inputs[1].value,
                                inputs[2].value,
                                inputs[3].value,
                            ],
                            five.value
                        )

                        addBroadcast.innerHTML = addressBroad(
                            [
                                inputs[0].value,
                                inputs[1].value,
                                inputs[2].value,
                                inputs[3].value,
                            ],
                            five.value
                        )

                        temp = addressNet(
                            [
                                inputs[0].value,
                                inputs[1].value,
                                inputs[2].value,
                                inputs[3].value,
                            ],
                            five.value
                        ).split('.')


                        temp[3] = Number(temp[3])  + 1


                        firstMachine.innerHTML = temp.join('.')


                        temp = addressBroad(
                            [
                                inputs[0].value,
                                inputs[1].value,
                                inputs[2].value,
                                inputs[3].value,
                            ],
                            five.value
                        ).split('.')


                        temp[3] = Number(temp[3])  - 1


                        lastMachine.innerHTML = temp.join('.')
                        countMachines.innerHTML = countMachine(five.value) + ' Addresse Possible';
                        classe.innerHTML = classes(inputs[0].value);
                    }

                }

                reset.onclick = ()=> {
                    resetAll();
                }

                function mask(mask) {
                    let result = [];
                    let temp = '';
                    let final = '';
                    for(let i = 1 ; i <= 32 ; i++){
                        (i <= mask) ? temp += 1  : temp += 0;
                        if(i % 8 == 0) {
                            result.push(temp);
                            temp = '';
                        }
                    }

                    result.forEach(element => {
                        final += bin_dec(element) + '.';
                    })


                    return final.split('.').slice(0,4).join('.');
                }


                function bin_dec(num) {
                    let result = 0;
                    num = String(num).split("").reverse().join("");
                    for(let i = 0 ; i < num.length ; i++) {
                        result += Number(num[i]) * (2**i);
                    }

                    return result;

                }

                function dec_bin(num) {

                    let result = '';
                    while(num > 0) {
                        result += num % 2;
                        num = Math.trunc((  num / 2));
                    }

                    return String(result).split('').reverse().join('');

                }


                function addressNet(address,m) {

                    let Mask = mask(m).split('.').slice(0,4);
                    let resultAdd = '';
                    let temp = '';
                    let resultMask = '';
                    let finalResult = '';
                    address.forEach(element => {
                        resultAdd += dec_bin(element).padStart(8,'0');
                    });

                    Mask.forEach(element => {
                        resultMask += dec_bin(element).padEnd(8,'0');

                    })

                    for(let i = 1 ; i <= 32 ; i++) {

                        temp += resultAdd[i-1] & resultMask[i-1];

                        if(i % 8 == 0) {
                            finalResult += bin_dec(temp) + '.';
                            temp = '';
                        }

                    }

                    return finalResult.split('.').slice(0,4).join('.');

                }

                function resetAll() {
                    five.value = '';
                    inputs.forEach(element => {
                        element.value = '';
                        element.classList.remove('is-invalid');
                    });
                    is_valid = false;
                    Mask.innerHTML = '0.0.0.0';
                    addBroadcast.innerHTML = '0.0.0.0';
                    addNetwork.innerHTML = '0.0.0.0';
                    classe.innerHTML = 'Vide'
                }

                function addressBroad(address,m) {

                    let Mask = mask(m).split('.').slice(0,4);
                    let resultAdd = '';
                    let temp = '';
                    let resultMask = '';
                    let finalResult = '';

                    address.forEach(element => {
                        resultAdd += dec_bin(element).padStart(8,'0');
                    });

                    Mask.forEach(element => {
                        resultMask += dec_bin(element).padEnd(8,'0');

                    })

                    for(let i = 1 ; i <= 32 ; i++) {


                        if(i > m) {
                            temp+= 1;
                        }else {
                            temp += resultAdd[i-1] & resultMask[i-1];
                        }

                        if(i % 8 == 0) {
                            finalResult += bin_dec(temp) + '.';
                            temp = '';
                        }

                    }

                    return finalResult.split('.').slice(0,4).join('.');

                }


                function classes(firstPart) {
                    firstPart = dec_bin(firstPart);
                    if(firstPart[0] == 0) return 'A';
                    else if(firstPart[0] + firstPart[1] == 10) return 'B';
                    else if(firstPart[0] + firstPart[1] + firstPart[2] == 110) return 'C';
                    else if(firstPart[0] + firstPart[1] + firstPart[2] + firstPart[3] == 1110) return 'D';
                    return  'E';

                }

                function countMachine(m) {
                    return 2**(32 - m) - 2;
                }



            </script>

@endsection
