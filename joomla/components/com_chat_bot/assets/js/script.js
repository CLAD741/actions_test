//Declaración de variables
var frase, cod, respuesta, frasetemp1="...", frasetemp2="....";
//Declaración de expresiones
var preguntarCual = RegExp ("(CUAL|CUÁL)");
var preguntarQuien = RegExp ("(QUIÉN|QUIEN)");
var preguntarQue = RegExp("(Q|QUÉ|QUE)");
var preguntarPorque = RegExp("(PORQUE|PORQUÉ|PORQ|POR QUÉ|POR QUE|POR Q)");
var negacion = /NO/;
var ti = RegExp("(TI|TECNOLOGÍA DE LA INFORMACIÓN|TECNOLOGÍA DE LA INFORMASIÓN|TECNOLOGÍA DE LA INFORMACION|TECNOLOGÍA DE LA INFORMASION|TECNOLOGIA DE LA INFORMACIÓN|TECNOLOGIA DE LA INFORMASIÓN|TECNOLOGIA DE LA INFORMACION|TECNOLOGIA DE LA INFORMASION|INFORMATION TECHNOLOGY)");
var tener = RegExp("(TIENE|TIENE|TENGO|TENÉS|TENES|TENEMOS|TIENEN|TENER)");
var tenerSinonimos = RegExp("(TENER|OBTENER|CONSEGUIR|OBTENGO|CONSIGO|OVTENER|OVTENGO)")
var existir = RegExp("(EXISTIR|EXISTE|HAY|AY|AHY|ESISTIR|ESISTE)")
var saludar = RegExp("(HOLA|HI|HELLO|OLA)");
var adios = RegExp("(ADIÓS|ADIOS|HASTA LUEGO|NOS VEMOS|CHAO)");
var comoestas = RegExp("(QUE HAY|QUÉ HAY|COMO ESTAS|CÓMO ESTÁS|COMO ESTÁS|CÓMO ESTÁS|QUÉ TAL|QUE TAL|CÓMO VA|COMO VA)");
var bien = RegExp("(BIEN|BIEN GRACIAS|BN|FINE|GOOD|BIEN GRASIAS)");
var tupregunta = RegExp("(Y TU|Y TÚ|Y USTED)");
var prestar = RegExp("(PRESTA|PRESTAR|PRESTAN|OFRECE|OFRESE|DAR|DAN|DA|ENTREGA|BRINDA)")
var dsit = RegExp("(DSIT|DIRECCION DE SERVICIOS DE INFORMACION Y TECNOLOGIA|DIRECCIÓN DE SERVICIOS DE INFORMACION Y TECNOLOGIA|DIRECCION DE SERVICIOS DE INFORMACIÓN Y TECNOLOGIA|DIRECCION DE SERVICIOS DE INFORMACION Y TECNOLOGÍA|DIRECCIÓN DE SERVICIOS DE INFORMACIÓN Y TECNOLOGÍA|DIRECCIÓN DE SERVICIOS DE INFORMACION Y TECNOLOGÍA|DIRECCION DE SERVICIOS DE INFORMACIÓN Y TECNOLOGÍA|DIRECCIÓN DE SERVICIOS DE INFORMACIÓN Y TECNOLOGIA)");
var servicio = RegExp("(SERVICIO|SERVISIO|SERBICIO|SERBISIO|CERBICIO|CERBISIO|CERVISIO|CERVICIO)");
var universidad = RegExp("(UNIVERSIDAD|EN LA UNIVERSIDAD|DE LA UNIVERSIDAD|UNIANDES|UNI ANDES|UNIANDINO)");
var solicitud = RegExp("(SOLICITUD|SOLICITUDES|SOLICITA|SOLICITAN|SOLICITAMOS|SOLICITAR|PEDIR|PIDO)");
var preguntanegacion = RegExp("(CUAL NO|CUALES NO|CÚAL NO|CÚALES NO|CUÁL NO|CUÁLES NO)");
var csc = RegExp("(CENTRO DE SERVICIOS COMPARTIDOS|CSC|CENTRO DE SERBICIOS COMPARTIDOS|CENTRO DE CERVICIOS COMPARTIDOS|CENTRO DE SERVISIOS COMPARTIDOS|CENTRO DE CERBISIOS COMPARTIDOS|CENTRO DE SERBICIOS|CENTRO DE CERBICIOS COMPARTIDOS|CENTRO DE CERVISIOS COMPARTIDOS|CENTRO DE SERBICIOS COMPARTIDOS|CENTRO DE SERBISIOS COMPARTIDOS|SENTRO DE SERVICIOS COMPARTIDOS|SENTRO DE SERBICIOS COMPARTIDOS|SENTRO DE CERVICIOS COMPARTIDOS|SENTRO DE SERVISIOS COMPARTIDOS|SENTRO DE CERBISIOS COMPARTIDOS|SENTRO DE SERBICIOS|SENTRO DE CERBICIOS COMPARTIDOS|SENTRO DE CERVISIOS COMPARTIDOS|SENTRO DE SERBICIOS COMPARTIDOS|SENTRO DE SERBISIOS COMPARTIDOS)");
var mismo = /MISMO/;
var directriz = RegExp("(DIRECTRIZ|DIRECTRIS|DIRECTRICES|DIRECTRISES|DIRECTRIZES|DIRECTRÍZ|DIRECTRÍS)");
var almacenamiento = RegExp("(ALMACENAMIENTO ESTRA|ALMASENAMIENTO|ALMACENAMIENTO|ALMACENAMIENTO EXTRA|ALMACENAMIENTO COMPARTIDO| ALMASENAMIENTO COMPARTIDO|ALMASENAMIENTO ESTRA)")
var ftp = /FTP/;
var enlace = RegExp("(ENLACE|ENLASE|ENLAZE)");
var compArch = RegExp("(COMPARTIR ARCHIVOS|COMPARTIR ARCHIVO|ARCHIVOS COMPARTIDOS|ARCHIBO COMPARTIDO|COMPARTIR ARCHIBOS|COMPARTIR ARCHIBO|ARCHIBOS COMPARTIDOS|ARCHIBO COMPARTIDO)");
var sitioweb = RegExp("(SITIO WEB|PORTAL WEB|WEB SITE|SITIOS WEB|PORTALES WEB)");
var cargar = RegExp("(CARGUE|CARGAR|CARGUÉ|CARGA|CARGAMOS|CARGARÍAMOS|CARGARIAMOS|CARGO|SUBIR|SUBO)");
var nota = /NOTA/;
var sistemas = RegExp("(BANNER|BANER|SICUA)");
var ingresar = RegExp("(INGRESAR|ENTRAR|ACCEDER|ACSEDER)");
var maqvirt = RegExp("(MAQUINA VIRTUAL|MÁQUINA VIRTUAL|MÁQUINAS VIRTUALES|MAQUINAS VIRTUALES)");
var servicioPL = RegExp("(PAAS|LAAS|PAS|LAS)");
var cloud = /CLOUD/;
var usar = RegExp("(USO|USAR|UTILIZAR|UTILISAR|USEMOS|USE)");
var tipo = /TIPO/;
var instalar = RegExp("(INSTALAR|INSTALACIÓN|INSTALACION|INSTALASION|INSTALASIÓN|INSTALO)");
var programa = RegExp("(PROGRAMA|SOFTWARE)");
var usuario = /USUARIO/;
var autentica = RegExp("(AUTENTICAR|AUTENTICACIÓN|AUTENTICASIÓN|AUTENTICACION|AUTENTICASION)");
var linux = RegExp ("(LINUX|LINUS)");
var dominio = /DOMINIO/;
var cuenta = /CUENTA/;
var cluster = RegExp("(CLUSTER|CLÚSTER|HPC|HIGH PERFORMANCE COMPUTER|COMPUTACIÓN DE ALTO RENDIMIENTO|COMPUTACION DE ALTO RENDIMIENTO|COMPUTASION DE ALTO RENDIMIENTO|COMPUTASIÓN DE ALTO RENDIMIENTO|COMPUTADOR DE ALTO RENDIMIENTO|COMPUTADORES DE ALTO RENDIMINETO)");
var job = RegExp("(JOB|TRABAJO)"); //Hace referencia al job que se envíe al cluster
var jobinteractivo = RegExp("(INTERACTIVE JOB|TRABAJO INTERACTIVO|TRABAJOS INTERACTIVO|TRABAJO INTERACTIBO|TRABAJOS INTERACTIBO|JOB INTERACTIVO)");
var conectar = RegExp("(CONECTO|CONECTA|CONÉCTO|CONÉCTA)");
var correr = RegExp("(CORRER|CORRA|RUN|ENVIAR|ENVÍO|ENVÍA|ENVIO|ENVIA|SEND|SENT|SOMETER|SOMETO|SUBMIT)");
var max = RegExp("(MÁXIMO|MAXIMO|MAX|MÁX|LÍMITE|LIMIT|LIMITE)");
var recursos = /RECURSO/;
var colas = RegExp("(COLA|KOLA|LISTA DE ESPERA|LISTAS DE ESPERA)"); //Se entiende por colas de espera en clúster
var nodo = /NODO/;
var capacidad = /CAPACIDAD/;
var python = RegExp("(PY|PYTHON|PYTON)");
var chatbot = RegExp ("(CHATBOT|CHAT BOT)");
var proyectosti = RegExp ("(PROYECTOS DE TECNOLOGIA|PROYECTO DE TECNOLOGIA|PROYECTOS DE TECNOLOGÍA|PROYECTO DE TECNOLOGÍA|PROYECTO DE TI|PROYECTO TI)");
var proyectos = RegExp ("(PROYECTO|PROJECT)");
var papeldsit = RegExp ("(LIDER|LÍDER|PAPEL|EJECUCIÓN)");
var adquirir = RegExp ("(ADQUISICIÓN|ADQUISICION|ADQUICISION|ADQUICISIÓN|ADQUISISIÓN|ADQUISISION|ADQUICICION|ADQUICICIÓN|ADQUIRIR|OBTENER|COMPRA|OVTENER|OBTENCIÓN|OBTENCION|OVTENCIÓN|OVTENCIÓN)");
var posiblesadquisicones =RegExp ("(SOFTWARE|LICENCIAMIENTO|LICENCIA|EQUIPO|PC|COMPUTADOR|LISENCIAMIENTO|LISENSIAMIENTO|LICENSIAMIENTO|LISENCIA|LISENSIA|LICENSIA|PORTATIL|PORTÁTIL)");
var ingenieroTI = RegExp ("(INGENIERO|INGENIERO RESIDENTE|INGENIERO DE RELACIONES|INGENIERO TI|INGENIERO DE TI|INGENIERO RTI|INGENIERO DE RTI)");
var asignar = RegExp ("(ASIGNA|DESIGNA|ADJUDICA)");
var presupuesto = /PRESUPUESTO/;
var proceso = RegExp ("(PROCESO|PROCESO|PROSESO)");
var help = RegExp("(AYUDA|HELP|ALLUDA|HLP|SOS|ASESOR)");
//var recommendar = RegExp ("(RECOMIENDA|RECOMENDABLE|RECOMENDARÍAS|RECOMENDARÍAS)");


  function evaluarExpresion() {
    frase = document.getElementById("txtPregunta").value;
    // frase.style.color ="#2271B3";
    escribirChat(frase);
    frase = frase.toUpperCase();
    document.getElementById("txtPregunta").value="";
    if (frasetemp2 !== frasetemp1){
        frasetemp2 = frasetemp1;
    }
    if (frase !== frasetemp1){
        frasetemp1 = frase;
    }
    cod=0;
    // document.getElementById("resultado1").innerHTML= preguntarQue.test(frase);
    // document.getElementById("resultado2").innerHTML= preguntarQuien.test(frase);
    // document.getElementById("resultado3").innerHTML= preguntarCual.test(frase);
    preguntas();
  }


  function preguntas(){
  if (help.test(frase) == true) {
     cod = 54;
  };  

  if (frase == "CLARO" ||frase == "SI" || frase == "SÍ" || frase == "CLARO QUE SÍ" || frase == "CLARO QUE SI" || frase == "CLARO Q SÍ" || frase == "CLARO Q SI"){
     cod = 14;
  };

  if (frase == "NO" || frase == "CREO QUE NO" || frase == "CREO Q NO"){
    cod = 15;
  };

  if (preguntanegacion.test(frase)==true ) {
      frase = "NO "+ frasetemp2;
      preguntas();
      return;
   };

  if (saludar.test(frase)==true ) {
      cod = 1;
  };

  if (comoestas.test(frase)==true) {
    cod = 3;
    if (saludar.test(frase)==true) {
      cod = 2;
    };
  };

  if (bien.test(frase)==true) {
    cod = 5;
    if (tupregunta.test(frase)==true) {
      cod = 4;
    };
  };

  if (ti.test(frase)==true){
    cod = 40;
    if (directriz.test(frase)==true) {
      if (existir.test(frase)==true || tener.test(frase)==true){
        cod = 10;
      };
      if (preguntarQue.test(frase)==true){
        cod = 27;
        if (preguntarPorque.test(frase)==true){
          cod = 26;
        };
      };
    };
  };

  if(dsit.test(frase)==true || servicio.test(frase)==true || proyectos.test(frase)==true){
    cod = 19;
    if (servicio.test(frase)==true) {
    cod = 6;
      if (dsit.test(frase)==true || prestar.test(frase)==true && dsit.test(frase)==true || prestar.test(frase)==true) {
        cod = 6;
        };
      if (negacion.test(frase)==true || negacion.test(frase)==true && prestar.test(frase)==true|| dsit.test(frase)==true && negacion.test(frase)==true || dsit.test(frase)==true && negacion.test(frase)==true && prestar.test(frase)==true) {
        cod = 7;
        };
    };
    if (proyectos.test(frase)==true){
      cod = 48;
    if (preguntarQue.test(frase)==true && papeldsit.test(frase)==true || preguntarCual.test(frase)==true && papeldsit.test(frase)==true || proyectos.test(frase)==true && preguntarQuien.test(frase)==true){
      cod = 47;
      };
    if (solicitud.test(frase)==true){
      cod = 50;
    };
    if (asignar.test(frase)==true && presupuesto.test(frase)==true){
      cod = 52;
    };
    if (proceso.test(frase)==true && solicitud.test(frase)==false){
      cod = 53;
    };
    };
  };

  if (dsit.test(frase)==true && csc.test(frase)==true) {
     if (mismo.test(frase)==true) {
      cod = 9;
    };
  };

  if (solicitud.test(frase)==true && servicio.test(frase)==true) {
    cod = 8;
  };

  if (tenerSinonimos.test(frase)==true && almacenamiento.test(frase)==true) {
    cod = 11;
  };

  if (compArch.test(frase)==true && ftp.test(frase)==true || compArch.test(frase)==true && enlace.test(frase)==true || compArch.test(frase)==true) {
    cod = 12;
  };

  if(adios.test(frase)==true){
    cod = 13;
  };

  if(solicitud.test(frase)==true && sitioweb.test(frase)==true){
    cod = 16;
  };

  if(cargar.test(frase)==true && sistemas.test(frase)==true && nota.test(frase)==true){
    cod = 17;
  };

  if(ingresar.test(frase)==true && sistemas.test(frase)==true && negacion.test(frase)==true){
    cod = 18;
  };

  if (maqvirt.test(frase)==true && cloud.test(frase)==false){
    cod = 23;
    if (conectar.test(frase)==true){
      cod = 34;
    };
    if (usar.test(frase)==true || usar.test(frase)==true && servicioPL.test(frase)==true){
      cod = 20;
    };
    if(tipo.test(frase)==true) {
      cod = 24;
    };
    if(instalar.test(frase)==true && programa.test(frase)==true) {
      cod = 25;
    };
  };

  if (maqvirt.test(frase)==true && cloud.test(frase)==true){
      cod = 22;
    };

  if(cloud.test(frase)==true && maqvirt.test(frase)==false){
    cod = 21;
  };

  if(usar.test(frase)==true && autentica.test(frase)==true && usuario.test(frase)==true){
    cod = 28;
  };

  if(universidad.test(frase)==true && linux.test(frase)==true && dominio.test(frase)==true){
    cod = 29;
  };


  if(cluster.test(frase)==true || job.test(frase)==true || colas.test(frase)==true || nodo.test(frase)==true || python.test(frase)==true){
    cod =31;
    if(nodo.test(frase)==true){
     cod = 39;
     if (capacidad.test(frase)==true){
       cod = 42;
     };
   };
     if(python.test(frase)==true){
      cod = 43;
      if(cluster.test(frase)==true && usar.test(frase)==true){
        cod = 44;
      };
    };

    if(cuenta.test(frase)==true){
        cod = 30;
      };
    if(job.test(frase)==true){
      cod = 37;
    if(job.test(frase)==true && correr.test(frase)==true || jobinteractivo.test(frase)==true){
      cod = 33;
      if(jobinteractivo.test(frase)==true){
        cod = 38;
        if(jobinteractivo.test(frase)==true && correr.test(frase)==true){
          cod = 36;
        };
      };
    };
  };

    if(instalar.test(frase)==true){
      cod = 32;
    };
    if(cargar.test(frase)==true){
      cod = 35;
    };
    if(colas.test(frase)==true){
      cod = 41;
    };
  };

  if(chatbot.test(frase)==true){
    cod = 45;
    if(tener.test(frase)==true || solicitud.test(frase)==true){
      cod = 46;
    };
  };

  if (adquirir.test(frase)== true && posiblesadquisicones.test(frase)==true || solicitud.test(frase)==true && posiblesadquisicones.test(frase)==true){
    cod = 49;
  };

  if (preguntarCual.test(frase)==true && ingenieroTI.test(frase)==true){
    cod = 51;
  };
  //Lama a responder
  setTimeout(responder, 200);
  }

  function responder() {
    var resp = Math.floor((Math.random() * 3) + 1);
    var mensaje;
    //console.log(cod);
    switch (cod) {

    case 1:
    if (resp == 1) {
         mensaje = "Hola! Cómo estás?";
    };
    if (resp == 2) {
         mensaje = "Hola! Cómo te va?";
    };
    if (resp == 3) {
         mensaje = "Hola! Cómo te ha ido?";
    };
    break;

    case 2:
    if (resp == 1) {
         mensaje = "Hola! Muy bien. ¿Y tú?";
    };
    if (resp == 2) {
         mensaje = "Hola! Bien gracias. ¿Y tú cómo estás?";
    };
    if (resp == 3) {
         mensaje = "Hola! Muy bien, gracias por preguntar. ¿Y tú?";
    };
    break;

    case 3:
    if (resp == 1) {
         mensaje = "Muy bien. ¿Y tú";
    };
    if (resp == 2) {
         mensaje = "Bien gracias. ¿Y tú?";
    };
    if (resp == 3) {
         mensaje = "Muy bien, gracias por preguntar. ¿Y tú?";
    };
    break;

    case 4:
    if (resp == 1) {
         mensaje = "Muy bien. ¿En qué te puedo ayudar?";
    };
    if (resp == 2) {
         mensaje = "Bien gracias. ¿En qué te puedo ayudar?";
    };
    if (resp == 3) {
         mensaje = "Muy bien, gracias por preguntar. ¿En qué te puedo ayudar?";
    };
    break;

    case 5:
        mensaje = "Me alegra mucho!. ¿En qué te puedo ayudar?";
    break;

    case 6:
        mensaje = "Los servicios que presta la DSIT se encuentran en el catálogo de servicios que enccontrarás en la sección 'Tecnología diseñada para ti'. \r¿Puedo ayudarte en algo más?";
    break;

    case 7:
    mensaje = "La DSIT canalizará los siguientes servicios a través del Centro de Servicios Compartidos (CSC) y no serán atentidos directamente a ningún miembro de la comunidad uniandina:\r Servicio técnico de arreglo o mantenimiento de computadores. \r Alistamiento de equipos nuevos de la Universidad o personales. \r Actualización o descarga de Antivirus para los equipos electrónicos. \r Back-up de equipos electrónicos.  Soporte a Sicua frente a contenidos, portal, etc. \r Asistencia técnica al Correo de los usuarios de la comunidad uniandina. \r Solicitud de licenciamientos de programas. \r Soporte técnico de las salas de reuniones. \r Préstamo equipo portátile. \r¿Puedo ayudarte en algo más?";
    break;

    case 8:
        mensaje = "Todos los servicios de TI ofrecidos por la Universidad son entregados por el CSC y por la DSIT.\r¿Puedo ayudarte en algo más?";
    break;

    case 9:
        mensaje = "La DSIT y el CSC son áreas diferentes pero trabajan en equipo en búsqueda de brindar un mejor servicio a la comunidad Uniandina. Si necesitas comunicarte con el CSC puedes escribir al correo csc@uniandes.edu.co o a la extensión 1234.\r¿Puedo ayudarte en algo más?";
    break;

    case 10:
        mensaje = "Si, en la Universidad existe una directriz para todos los aspectos relacionados con Tecnologías de la Información.\r¿Puedo ayudarte en algo más?";
    break;

    case 11:
        mensaje = "Las opciones de Almacenamiento que tienes disponibles en la Universidad son: \r1. OneDrive a través de Office 365. Puedes encontrar este aplicativo en el menú de despliegue dentro del sitio web del correo de la Universidad. Este aplicativo está diseñado para uso personal y para compartir documentos con otros usuarios Uniandes. \r2. Sharepoint Se pueden crear grupos de correo o sitios en Sharepoint de Office 365. Este aplicativo está diseñado para trabajo colaborativo con uno o varios propietarios y con posibilidad de acceso restringido. Para sincronizar una carpeta puedes seguir las instrucciones en este enlace: (https://support.office.com/es-es/art \r¿Puedo ayudarte en algo más?";
    break;

    case 12:
        mensaje = "Sí. En la Universidad disponemos de un servicio de almacenamiento basado en objetos, llamados Blobs, en estos se pueden guardar y compartir archivos arbitrarios. Para los archivos presentes en el sistema de almacenamiento se pueden generar enlaces de descarga directa o utilzar un cliente para subir y descargar archivos a través de llamados REST.\r¿Puedo ayudarte en algo más?";
    break;

    case 13:
    if (resp == 1) {
         mensaje = ">Hasta luego, que tengas un felíz día.";
    };
    if (resp == 2) {
         mensaje = "Hasta luego.";
    };
    if (resp == 3) {
         mensaje = "Adiós";
    };
    break;

    case 14:
    if (resp == 1) {
         mensaje = "¿En qué más podría ayudarte?";
    };
    if (resp == 2) {
         mensaje = "¿Qué otra duda tienes?";
    };
    if (resp == 3) {
         mensaje = "¿Cómo puedo ayudarte?";
    };
    break;

    case 15:
    if (resp == 1) {
         mensaje = "Siendo así creo que me despediré. Hasta luego!";
    };
    if (resp == 2) {
         mensaje = "Bueno, espero haber sido de ayuda. Nos vemos.";
    };
    if (resp == 3) {
         mensaje = "Está bien, que tengas un felíz día.";
    };
    break;

    case 16:
        mensaje = "Puedes solicitar un sitio web sitio.uniandes.academy a través de la mesa de servicio. Indica el template que requieras de la plataforma Yootheme y te asignarán el sitio. No se da soporte a creación de contenido y es resposabilidad de cada estudiante.\r¿Puedo ayudarte en algo más?"
    break;

    case 17:
        mensaje = "El cargue de notas en Banner debe ser realizado manualmente nota por nota.\r¿Puedo ayudarte en algo más?";
    break;

    case 18:
        mensaje = "Si eres uniandino, dale ingresar como comunidad y escribe tu correo completo (user@uniandes.edu.co). Si tienes problemas con tu clave debes ingresar a la URL https://cuenta.uniandes.edu.co/Cuenta/ \r¿Puedo ayudarte en algo más?";
    break;

    case 19:
        mensaje = "Es la 'Dirección de servicios de información y tecnología'. \r¿Puedo ayudarte en algo más?";
    break;

    case 20:
        mensaje = "Depende de lo que necesites en tu aplicación, para cargas de trabajo normal es recomendable utilizar los servicios PaaS para servidores web y de bases de datos. En caso de que necesites ejecutar una aplicación especializada usualmente es más sencillo utilizar una máquina virtual de Infraestructura como Servicio (IaaS). Sin embargo, al utilizar IaaS debes ser responsable por el sistema operativo, desde el punto de vista de administración, seguridad y actualizaciones. Si tienes alguna duda puedes escribirnos al correo ti_investigacion@uniandes.edu.co \r¿Puedo ayudarte en algo más?";
    break;

    case 21:
        mensaje = "Cloud académico es el servicio de aprovisionamiento de máquinas virtuales en sitio o en la nube pública para tener capacidad de procesamiento mayor en máquinas dedicadas con acceso remoto. \r¿Puedo ayudarte en algo más?";
    break;

    case 22:
        mensaje = "Los recursos de HPC y Cloud Académico se solicitan a través de la convocatoria de Vicerrectoría de Investigaciones disponible en https://convcloudhpc.uniandes.edu.co. Si tienes preguntas escríbenos a ti_investigacion@uniandes.edu.co \r¿Puedo ayudarte en algo más?";
    break;

    case 23:
        mensaje = "Una máquina virtual es una máquina que corre en un servidor alojado en alguna parte del mundo. Se puede acceder a ellas remotamente y trabajar como en el computador propio. \r¿Puedo ayudarte en algo más?";
    break;

    case 24:
        mensaje = "En el Cloud local se pueden configurar máquinas de diferentes capacidades de CPU, RAM y almacenamiento de acuerdo a la disponibilidad. En el cloud público se pueden aprovisionar todas las máquinas disponibles en azure.com, sin embargo, tenemos convenio para uso de algunas de ellas. Si requieres más información, escríbenos a ti_investigacion@uniandes.edu.co. \r¿Puedo ayudarte en algo más?";
    break;

    case 25:
        mensaje = "En las máquinas virtuales se puede instalar todo el software Open Source del mercado, software licenciado por campus agreement con licencia para entornos virtuales y software propio o licenciado por cada usuario. \r¿Puedo ayudarte en algo más?";
    break;

    case 26:
    mensaje = "Porque las TI son estratégicas para el logro de la misión de la Universidad y como miembros de la comunidad Uniandina debemos regirnos por estos principios:\r1. Transparencia: ofrecemos una visión integral y transparente de las decisiones de TI, desde la necesidad hasta la terminación de su ciclo de vida.\r2. Cultura digital: facilitamos el trabajo del día a día de la comunidad Uniandina a través de experiencias de usuario exitosas soportadas en TI.\r3. Transformación: usamos ciclos de disrupción y transformación digital para crear valor a la comunidad.\r4. Seguridad digital: protegemos la información digital de la comunidad Uniandina, entendiendo que es un activo crítico para la Universidad.\r5. Colaboración: tomamos las decisiones de TI buscando el bien común, entendiendo la diversidad, trabajando en equipo y aprovechando la riqueza de conocimiento de la comunidad Uniandina.\r6. Simplicidad: gestionamos la tecnología de forma simple, ágil y flexible.\r7. Racionalidad: promovemos la optimización, la apropiación y el uso racional de los recursos tecnológicos. \r¿Puedo ayudarte en algo más?";
    break;

    case 27:
    mensaje = "La directriz de TI contiene los lineamientos generales de las 6 dimensiones que permitirán gestionar mejor el uso de las TI en la Universidad:\r1. Arquitectura digital de referencia: una guía que define cómo se estructuran, integran, restringen y coordinan las soluciones de TI de la Universidad en los dominios de información, aplicaciones e infraestructura, y en los aspectos de seguridad, integración, procesos y costos.\r2. Gobierno de TI: el sistema que permite dirigir, evaluar y controlar el uso de las TI y, por lo tanto, provee herramientas para la definición, el monitoreo y el control del Plan Estratégico de Tecnologías de la Información (PETI), define los órganos de Gobierno encargados de la toma de decisiones y la rendición de cuentas de TI, y establece los mecanismos para garantizar el cumplimiento de la normatividad interna y externa.\r3. Gestión de servicios de TI: el conjunto de actividades que garantiza la prestación de servicios de TI alineados con las necesidades de la Universidad y enfocados en la entrega de valor, a través de la correcta integración de personas, procesos y tecnología.\r4. Seguridad de la información digital: el conjunto de lineamientos y procedimientos implementados para proteger los activos de información institucionales gestionados a través de las TI.\r5. Gerencia de proyectos de TI: la aplicación de las mejores prácticas para la administración del ciclo de vida de un proyecto, con el fin de cumplir sus objetivos y alcanzar los beneficios esperados. \r¿Puedo ayudarte en algo más?";
    break;

    case 28:
        mensaje = "Debes comunicarte con el área de Colaboración y Comunicación de la DSIT a través del correo __________. La Universidad cuenta con un sistema de autenticación Azure Active Directory, que provee los protocolos de autenticación OAuth2 y SAML 2.0. Usted debe programar su aplicación tal que sea compatible con estos protocolos. \r¿Puedo ayudarte en algo más?";
    break;

    case 29:
        mensaje = "Si no tienes permisos en el directorio activo para crear objetos 'Computer', debes solicitar a la mesa de servicio la creación del objeto con el nombre de tu equipo, una vez creado el objeto utiliza realmd para unir la máquina.\rHas clic en este enlace para más información del proceso. (https://access.redhat.com/documentation/en-us/red_hat_enterprise_linux/7/html/windows_integration_guide/adding-linux-to-ad). \r¿Puedo ayudarte en algo más?";
    break;

    case 30:
        mensaje = "Los recursos de HPC y Cloud Académico se solicitan a través de la convocatoria de Vicerrectoría de Investigaciones disponible en https://convcloudhpc.uniandes.edu.co. Si tienes preguntas escríbenos a ti_investigacion@uniandes.edu.co. \r¿Puedo ayudarte en algo más?";
    break;

    case 31:
        mensaje = "HPC es un cluster de cómputo de alto desempeño para tener gran capacidad de procesamiento y almacenamiento a través de un sistema de colas de recursos compartidos. \rSi necesitas más información puedes escribirnos a ti_investigacion@uniandes.edu.co \r¿Puedo ayudarte en algo más?";
    break;

    case 32:
        mensaje = "Para instalar software en el cluster, escribe a soportehpc@uniandes.edu.co solicitando la instalación del programa que necesites. No olvides enviar el nombre del programa, versión y link de descarga. Si es necesario, envía la licencia. \r¿Puedo ayudarte en algo más?";
    break;

    case 33:
        mensaje = "Para enviar un job al cluster debes hacer un Script de PBS como está en https://hpc.uniandes.edu.co/index.php/home-4/trabajos y enviarlo con el comando 'qsub ''. Puedes encontrar algunos ejemplos de software común en https://hpc.uniandes.edu.co/index.php/home-4/scripts. \r¿Puedo ayudarte en algo más?";
    break;

    case 34:
        mensaje = "Para conectarte a tu máquina virtual: si la máquina es Windows, puedes conectarte por escritorio remoto. Si la máquina es Linux, puedes conectarte con un cliente de SSH. Consulta la dirección de tu máquina en cloudvra.uniandes.edu.co/vcac si está en el cloud local o en portal.azure.com si está en el cloud público. \r¿Puedo ayudarte en algo más?";
    break;

    case 35:
        mensaje = "Para usar un programa con 'module avail' verifica que el programa esté configurado como módulo. Posteriormente utiliza 'module load' para cargar todo el ambiente requerido para correr el programa. \r¿Puedo ayudarte en algo más?";
    break;

    case 36:
        mensaje = "Para correr un job interactivo puedes ejecutar la línea 'qsub -I -l nodes=#:ppn=#:mem=##' modificando # por el número de nodos, procesadores y memoria que necesites. \r¿Puedo ayudarte en algo más?";
    break;

    case 37:
        mensaje = "Un trabajo (job) es un set de instrucciones configuradas en un archivo tipo Portable Batch System (PBS). Las instrucciones en PBS definen los comandos y recursos que se quieren usar en un trabajo (job). \r¿Puedo ayudarte en algo más?"
    break;

    case 38:
        mensaje = "Aquí va definición de Job interactivo \r¿Puedo ayudarte en algo más?"
    break;

    case 39:
        mensaje = "Aquí va la definición de nodos. \r¿Puedo ayudarte en algo más?"
    break;

    case 40:
        mensaje = "Tecnología de la Información. \r¿Puedo ayudarte en algo más?";
    break;

    case 41:
        mensaje = "Consulta los límites de las colas en https://hpc.uniandes.edu.co/index.php/home-4/uso-de-colas. \r¿Puedo ayudarte en algo más?";
    break;

    case 42:
        mensaje = "El máximo de capacidad es de 48 cores y 512GB RAM por nodo. \r¿Puedo ayudarte en algo más?"
    break;

    case 43:
        mensaje = "Python es un lenguaje de programación gratuito, multiplataforma y de código abierto que es potente y fácil de aprender. Es ampliamente utilizado y compatible. Para obtener más información sobre Python, visite python.org. \r¿Puedo ayudarte en algo más?"
    break;

    case 44:
        mensaje = "Para usar python en HPC debes cargar el módulo correspondiente. Tenemos la versión 2.7 en anaconda/python2 y la versión 3.1 en anaconda/python3. \r¿Puedo ayudarte en algo más?"
    break;

    case 45:
        mensaje = "Yo soy un Chatbot :). \r¿Puedo ayudarte en algo más?"
    break;

    case 46:
        mensaje = "Puedes agendar una reunión con el Centro de Experiencia de Innovación de la DSIT a través del ingeniero de Relacionamiento de tu Unidad para revisar las necesidades que tienes en tu Unidad y así, realizar el procedimiento necesario para solicitar la implementación. \r¿Puedo ayudarte en algo más?"
    break;

    case 47:
        mensaje = "La DSIT lidera la ejecución de los proyectos de tecnologías de información, desde su inicio hasta el final, asegurando su ejecución y terminación de acuerdo a los lineamientos establecidos para cada proyecto.\rGestionar con cada proveedor la realización de actividades.\rRealizar revisiones de avance de los proyectos.\rCoordinar con el equipo funcional (usuarios) las actividades que se requieran.\rRealizar y revisar el cronograma periodicamente.\r¿Puedo ayudarte en algo más?";
    break;

    case 48:
        mensaje = "Un proyecto es un esfuerzo que se lleva a cabo para crear un producto, servicio o resultado único, y tiene la característica de ser naturalmente temporal, es decir, que tiene un inicio y un final establecidos, y que el final se alcanza cuando se logran los objetivos del proyecto o cuando se termina el proyecto porque sus objetivos no se cumplirán o no pueden ser cumplidos, o cuando ya no existe la necesidad que dio origen al proyecto.\r¿Puedo ayudarte en algo más?"
    break;

    case 49:
        mensaje = "Para la adquisición de Licenciamiento o de un equipo debes seguir estos pasos:\r1. Verifica que el Sofware o equipo no haya sido comprado ya por la Universidad. Para dicha validación escribe a la mesa de servicio al correo servicioalclientedsit@uniandes.edu.co, con las características y/o especificaciones que necesitas. Si ya se cuenta con lo que necesitas en la Universidad, a través de dicho correo te explicaran qué debes hacer para tener acceso a él.\r2. En caso de no contar con el Sofware o equipo debes contar con la aprobación del proceso interno de solicitud de compras de tu Facultad o Unidad Administrativa.\r3. Una vez cuentas con la aprobación interna, debes dirigirte al gestor o gestora del Centro de Servicios Compartidos (CSC) encargado de la Unidad ó Facultad a la que perteneces al correo csc@uniandes.edu.co ó, en caso de que pertenezcas a una Unidad Administrativa debes comunicarte con la Unidad Administrativa Central (UAC).\r¿Puedo ayudarte en algo más?"
    break;

    case 50:
        mensaje = "Todas las solicitudes de proyectos de TI deben ser comunicadas al ingeniero residente asignado a la unidad, quien es el único canal definido y autorizado por la DSIT para iniciar el proceso correspondiente. Ningún proyecto recibido por otro canal será atendido.\r¿Puedo ayudarte en algo más?";
    break;

    case 51:
        mensaje = "El listado de los ingenieros residentes se encuentra publicado en la página web https://tecnologia.uniandes.edu.co/. \r ¿Puedo ayudarte en algo más?"
    break;

    case 52:
        mensaje = "La asignación del presupuesto al proyecto es responsabilidad de la unidad que lo solicita, por lo tanto, no se dará inicio al proyecto si la unidad no cuenta con el presupuesto aprobado. En este caso la responsabilidad de solicitarlo será exclusivamente de la unidad, siguiendo los procesos definidos por la Dirección financiera de la Universidad. \r ¿Puedo ayudarte en algo más?"
    break;

    case 53:
        mensaje = "El proceso de solicitud, ejecución y cierre de los proyectos de TI de la Universidad se encuentra descrito en la Directriz de TI, que puede ser consultada en la página de la Secretaría general: https://secretariageneral.uniandes.edu.co. \r ¿Puedo ayudarte en algo más?"
    break;

    case 54:
      mensaje =  "Te puedo responder preguntas sobre los siguientes temas: \r1. Dirección de servicios de Información y tecnolog�a.\r2. Almacenamiento.\r3. Aplicaciones y herramientas.\r4. Computación de alto rendimiento (HPC).\r5. Computación en la nube.\r6. Iniciativas y proyectos.\r7. Licenciamiento.\r8. Proyectos.\r9. Seguridad.\r10. Servicios de comunicación."
    break;
    default:
    mensaje = "No entiendo lo que me estás diciendo";

    }

  escribirChat("ImNotAChatBot: " + mensaje);
  fraseinput = 'txtPregunta='+ frase;
  codrespuestainput = 'codrespuesta='+ cod;
  datos = fraseinput + '&' + codrespuestainput;
  console.log(datos);
  $.ajax({
    type: 'POST',
    url: 'components/com_chat_bot/assets/connect.php',
    data: datos,
    success: function(data){
      console.log(data);
    }
  });
  }

function escribirChat (texto) {
  var textarea = document.getElementById('areaChat');
  document.getElementById("areaChat").value += texto + "\r";
  textarea.scrollTop = textarea.scrollHeight;
}
