<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;

use App\Mail\SolicitudRegister;
use Illuminate\Support\Facades\Mail;



class LandingController extends Controller
{
    public function index(){
        return view('landing/index');
    }

    public function register_dealer(Request $request){

        request()->validate([
            'email' => ['required','email','unique:users,email'],
            'nombre' => 'required',
            'apellido_p' => 'required',
            'telefono' => 'required',
            'empresa' => 'required',
            'puesto' => 'required',
            'razon_social' => 'required',
            'no_instrumento' => 'required',
            'acta_volumen' => 'required',
            'acta_fecha' => 'required',
            'acta_localidad' => 'required',
            'acta_numero' => 'required',
            'acta_datos' => 'required',
            'rfc_numero' => 'required',
            'rfc_volumen' => 'required',
            'rfc_fecha' => 'required',
            'rfc_localidad' => 'required',
            'rfc_telefono' => 'required',
            'rfc_email' => 'required',
            'ine' => 'required',
            'acta_constitutiva' => 'required',
            'identificacion' => 'required',
            'poder_notarial' => 'required',
            'hoja_registro' => 'required',
            'comprobante' => 'required',
            'check_confirmo' => 'required',
        ],[
            'email.unique' => 'Este correo ya se encuentra registrado',
            'email.required' => 'Ingresa un correo electronico valido',
            'email.email' => 'Ingresa un correo electronico valido',
            'nombre.required' => 'Ingresa tu nombre',
            'apellido_p.required' => 'Ingresa tu Apellido Paterno',
            'telefono.required' => 'Ingresa tu teléfono',
            'empresa.required' => 'Ingresa el nombre de la Agencia o Concesionaria',
            'puesto.required' => 'Ingresa el puesto que desempeñas.',
            'razon_social.required' => 'Ingresa la razón social.',
            'no_instrumento.required' => 'Ingresa el número de instrumento para acta constitutiva.',
            'acta_volumen.required' => 'Ingresa el volumen para acta constitutiva.',
            'acta_fecha.required' => 'Ingresa la fecha del acta constitutiva.',
            'acta_localidad.required' => 'Ingresa la localidad del acta constitutiva.',
            'acta_numero.required' => 'Ingresa número de notario del acta constitutiva.',
            'acta_datos.required' => 'Ingresa datos de inscripción del acta constitutiva.',
            'rfc_numero.required' => 'Ingresa el RFC.',
            'rfc_volumen.required' => 'Ingresa el volumen de RFC.',
            'rfc_fecha.required' => 'Ingresa la fecha de RFC.',
            'rfc_localidad.required' => 'Ingresa el domicilio de RFC.',
            'rfc_telefono.required' => 'Ingresa el teléfono del RFC.',
            'rfc_email.required' => 'Ingresa el email del RFC.',
            'ine.required' => 'Falto subir tu INE.',
            'acta_constitutiva.required' => 'Falto subir tu acta constitutiva.',
            'identificacion.required' => 'Falto subir la identificación del apoderado legal.',
            'poder_notarial.required' => 'Falto subir el poder notarial.',
            'hoja_registro.required' => 'Falto subir la hoja de registro del RFC.',
            'comprobante.required' => 'Falto subir el comprobante de domicilio.',
            'check_confirmo.required' => 'Debés de confirmar que la información es válida.',
            
        ]);

        $solicitud = Solicitud::create([
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'membresia' => $request->membresia,
            'empresa' => $request->empresa,
            'puesto' => $request->puesto,
            'razon_social' => $request->razon_social,
            'no_instrumento' => $request->no_instrumento,
            'acta_volumen' => $request->acta_volumen,
            'acta_fecha' => $request->acta_fecha,
            'acta_localidad' => $request->acta_localidad,
            'acta_numero' => $request->acta_numero,
            'acta_datos' => $request->acta_datos,
            'rfc_numero' => $request->rfc_numero,
            'rfc_volumen' => $request->rfc_volumen,
            'rfc_fecha' => $request->rfc_fecha,
            'rfc_localidad' => $request->rfc_localidad,
            'rfc_telefono' => $request->rfc_telefono,
            'rfc_email' => $request->rfc_email,
        ]);

        $ine = $this->uploadImage($request,$solicitud->id,'ine');
        $acta_constitutiva = $this->uploadImage($request,$solicitud->id,'acta_constitutiva');
        $identificacion = $this->uploadImage($request,$solicitud->id,'identificacion');
        $poder_notarial = $this->uploadImage($request,$solicitud->id,'poder_notarial');
        $hoja_registro = $this->uploadImage($request,$solicitud->id,'hoja_registro');
        $comprobante = $this->uploadImage($request,$solicitud->id,'comprobante');

        $updateSol = Solicitud::where('id',$solicitud->id)->update([
            'ine' => $ine,
            'acta_constitutiva' => $acta_constitutiva,
            'identificacion' => $identificacion,
            'poder_notarial' => $poder_notarial,
            'hoja_registro' => $hoja_registro,
            'comprobante' => $comprobante,
        ]);

        Mail::to($solicitud->email)->send(new SolicitudRegister($solicitud));

        return redirect()->route('landing.index')->with('statusSol','Tu solicitud se a creado con éxito. Te estaremos avisando el estatus con el correo que registraste. <br> <strong>'. $solicitud->email .'</strong> <br> ¡Gracias!');
    }

    public function uploadImage($request,$solicitud_id,$input)
    {

        if ($request->hasFile($input)) {
            $file = $request->file($input);
            $name = $file->getClientOriginalName();
            $nameResult = $this->generateNameFile($name);

            request()->file($input)->storeAs('public', 'solicitudes/s'.$solicitud_id.'/' . $nameResult);

            return $nameResult;
        } else {
            return null;
        }

    }

    public function generateNameFile($value)
    {
        $link = html_entity_decode($value);
        $link = $this->deleteAccents($link);
        $link = strtolower($link); //paso todo a minisculas
        $link = preg_replace("/[^ A-Za-z0-9_.-]/", '', $link); //quito los caracteres que no sean letras o numeros
        $link = str_replace(' ', '-', $link);

        return $link;
    }

    public function deleteAccents($cadena)
    {
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        return utf8_encode($cadena);
    }
}
