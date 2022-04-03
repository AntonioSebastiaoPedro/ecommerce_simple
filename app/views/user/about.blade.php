@extends('user.template')
@section('active3', 'active')

@section('body')
    <section id="pagina-cabecalho" class="about-header">

        <h2>O que há sobre nós</h2>

        <p>informe-se sobre sua futura loja preferida</p>

    </section>

    <section id="about-head" class="section-p1">
        <img src="@php echo DIRIMG.'img/testesobre.jpg' @endphp" alt="">
        <div>
            <h3>Sobre Nós</h3>
            <p>Somos apaixonados por smartphone . Estamos a par dos últimos modelos de smartphones, conhecemos a fundo cada marca e estamos sempre à procura de novas soluções. E só assim conseguimos estar seguros de que os produtos que selecionamos têm alta qualidade, boa performance e se adequam ao seu dia a dia.
    
                Para nós, escolher produtos de qualidade é ótimo, mas não chega: é preciso acompanhar os clientes durante todo o processo.
                
                Alguns dos smartphones que disponibilizamos são conhecidos em Angola, e são os preferidos de muitos utilizadores em todo o mundo, dado o seu excelente desempenho.
                
                Se está à procura de um novo smartphone e ficou curioso sobre os nossos, comece agora a explorar as nossas gamas. Se tiver alguma dúvida, fale connosco. Teremos todo o gosto em conversar consigo.</p>
                <hr>
            </div>
    </section>

@endsection