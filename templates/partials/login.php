
<!-- Css signup -->
<link rel="stylesheet" href="assets/signup.css">

<div class="grand-parent container">
    <form class="form-parent" action="" method="POST">
        <div class="form-container">
            <div class="form" id="sign-in-form">
                <h1 class="signTitle">Connexion</h1>
                <div class="fields">
                    <label for="email">email</label>
                    <input type="text" name="email"  placeholder="Votre  email" autocomplete="off">
                    <input type="password" name="password" placeholder="Mot de passe" autocomplete="off">
                    
                </div>
                <div class="submit-container">
                    <button type="submit" name="validate" class="btn">se connecter</button>
                    <p class="link"><a href="signup.php">Vous n'avez pas de compte ? Inscrivez-vous</a></p>
                    <p class="link"><a href="reset_password.php">Mot de passe oublié</a></p>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- login.twig -->
{# {% extends 'base.html.twig' %} #}

{# {% block title %}Log in!{% endblock %} #}
<title>{% block title %}BDR - Test{% endblock %}</title>


{% include "partials/head.php" %}
{% include "partials/navbar.html.twig" %}

{% block body %}


{# ------------------------------------------------------------------------------------------- #}


<!-- Css signup -->
<link rel="stylesheet" href="assets/signup.css">

<div class="grand-parent container">
    <form class="form-parent" action="" method="POST">
    {% if app.user %}
        <div class="mb-3">
            You are logged in as {{ app.user.userIdentifier }}, <a href="{{ path('app_logout') }}">Logout</a>
        </div>
    {% endif %}
    <div class="message-flash">
        {% if error %}
        <div class="alert alert-danger">{{ error.messageKey|trans(error.messageData, 'security') }}</div>
    {% endif %}

    {% if app.user %}
        <div class="mb-3">
            You are logged in as {{ app.user.userIdentifier }}, <a href="{{ path('app_logout') }}">Logout</a>
        </div>
    {% endif %}
    </div>
        <div class="form-container">
            <div class="form" id="sign-in-form">
                <h1 class="signTitle ">Connexion</h1>
                <div class="fields flex fdc jcc aic pt-40">
                    <label class="fields-item mt-20" for="inputEmail">Email</label>
                    <input class="fields-item-input mt-10" type="email" value="{{ last_username }}" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus>
                    <label class="fields-item mt-20" for="inputPassword">Password</label>
                    <input class="fields-item-input mt-10" type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required>
                    <input type="hidden" name="_csrf_token"
                        value="{{ csrf_token('authenticate') }}"
                    >
                </div>
                <div class="checkbox mt-20">
                    <label>
                        <input type="checkbox" name="_remember_me"> Se souvenir de moi
                    </label>
                </div>
                <div class="submit-container mt-40">
                    <button type="submit"  class="btn">se connecter</button>
                    <p class="link"><a href="/register">Vous n'avez pas de compte ? Inscrivez-vous</a></p>
                    <p class="link"><a href="reset_password.php">Mot de passe oublié</a></p>
                </div>
            </div>
        </div>
    </form>
</div>

{# ------------------------------------------------------------------------------------------- #}

    {#
        Uncomment this section and add a remember_me option below your firewall to activate remember me functionality.
        See https://symfony.com/doc/current/security/remember_me.html

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="_remember_me"> Remember me
            </label>
        </div>
    #}


{% endblock %}


