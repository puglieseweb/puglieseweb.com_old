
[#import "/org/springframework/web/servlet/view/freemarker/spring.ftl" as spring /]
[#assign htmlEscape=true in spring /]
[#assign blossom=JspTaglibs["blossom-taglib"] /]

<style type="text/css">
    .textinput {margin-bottom:8px;}
    .errorMessage {color:red;}
</style>

<h1>Contact Form</h1>

<form action="?" method="POST">
    [@blossom.pecidInput /]
    Your Name<br/>
    [@spring.formInput path="contactForm.name" attributes='class="textinput"' /]&nbsp;[@spring.showErrors separator=", " classOrStyle="errorMessage" /]<br/>
    Your E-mail<br/>
    [@spring.formInput path="contactForm.email" attributes='class="textinput"' /]&nbsp;[@spring.showErrors separator=", " classOrStyle="errorMessage" /]<br/>
    [@spring.bind path="contactForm.message" /]
    Message&nbsp;[@spring.showErrors separator=", " classOrStyle="errorMessage" /]<br/>
    [@spring.formTextarea path="contactForm.message" attributes='cols="60" rows="20" class="textinput"' /]<br/>
    <input type="submit" value="Send" />
</form>