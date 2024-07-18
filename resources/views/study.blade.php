@extends('layouts.app')

@section('title', 'Учеба')

@section('extra-css')
    @vite('resources/css/pages/study.css')
@endsection

@section('content')
<main>
    <table>

        <thead>
            <tr>
                <td colspan="9">ПЛАН УЧЕБНОГО ПРОЦЕССА</td>
            </tr>
            <tr>
                <td rowspan="2">№</td>
                <td rowspan="2">Дисциплина</td>
                <td rowspan="2">Кафедра</td>
                <td colspan="6">Всего часов</td>
            </tr>
            <tr>
                <td>Всего</td>
                <td>Ауд</td>
                <td>Лк</td>
                <td>Лб</td>
                <td>Пр</td>
                <td>СРС</td>
            </tr>
        </thead>

        <tr>
            <td>1</td>
            <td>Экология</td>
            <td>БЖ</td>
            <td>54</td>
            <td>27</td>
            <td>18</td>
            <td>0</td>
            <td>9</td>
            <td>27</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Высшая математика</td>
            <td>ВМ</td>
            <td>540</td>
            <td>282</td>
            <td>141</td>
            <td>0</td>
            <td>141</td>
            <td>258</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Русский язык и культура речи</td>
            <td>НГиГ</td>
            <td>108</td>
            <td>54</td>
            <td>18</td>
            <td>0</td>
            <td>36</td>
            <td>54</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Основы дискретной математики</td>
            <td>ИС</td>
            <td>216</td>
            <td>139</td>
            <td>87</td>
            <td>0</td>
            <td>52</td>
            <td>77</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Основы программирования и алгоритмические языки</td>
            <td>ИС</td>
            <td>405</td>
            <td>210</td>
            <td>105</td>
            <td>87</td>
            <td>18</td>
            <td>195</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Основы экологии</td>
            <td>ПЭОП</td>
            <td>54</td>
            <td>27</td>
            <td>18</td>
            <td>0</td>
            <td>9</td>
            <td>27</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Теория вероятностей и математическая статистика</td>
            <td>ИC</td>
            <td>162</td>
            <td>72</td>
            <td>54</td>
            <td>18</td>
            <td>0</td>
            <td>90</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Физика</td>
            <td>Физики</td>
            <td>324</td>
            <td>194</td>
            <td>106</td>
            <td>88</td>
            <td>0</td>
            <td>130</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Основы электротехники и электроники</td>
            <td>ИС</td>
            <td>108</td>
            <td>72</td>
            <td>36</td>
            <td>18</td>
            <td>18</td>
            <td>36</td>
        </tr>
        <tr>
            <td>10</td>
            <td>Численные методы в информатике</td>
            <td>ИС</td>
            <td>189</td>
            <td>89</td>
            <td>36</td>
            <td>36</td>
            <td>17</td>
            <td>100</td>
        </tr>
        <tr>
            <td>11</td>
            <td>Методы исследование операций</td>
            <td>ИС</td>
            <td>216</td>
            <td>104</td>
            <td>52</td>
            <td>35</td>
            <td>17</td>
            <td>112</td>
        </tr>

    </table>

</main>
@endsection
