<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="../css/contacto.css">
</head>
<body>
    
    <form class="form" action="../php/datos_contacto.php" method="POST">
        <div class="flex">
            <label>
                <input required="" placeholder="" type="text" name="first_name" class="input">
                <span>first name</span>
            </label>
    
            <label>
                <input required="" placeholder="" type="text" name="last_name" class="input">
                <span>last name</span>
            </label>
        </div>  
        
        <label>
            <input required="" placeholder="" type="email" name="email" class="input">
            <span>email</span>
        </label> 
        
        <label>
            <input required="" type="tel" name="contact_number" placeholder="" class="input">
            <span>contact number</span>
        </label>
        
        <label>
            <textarea required="" rows="3" name="message" placeholder="" class="input01"></textarea>
            <span>message</span>
        </label>
        
        <button class="fancy" type="submit">
            <span class="top-key"></span>
            <span class="text">enviar</span>
            <span class="bottom-key-1"></span>
            <span class="bottom-key-2"></span>
        </button>
    </form>
    
    
</body>
</html>
