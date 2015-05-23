function minuterie () {
    k++;    //  décrémentation des secondes
    if(k>59)
    {
        k = 0;
        l++;    //  décrémentation des minutes
    }
    if(k<10)
    {
        compteur.innerHTML = j+":"+l+":0"+k;
    }
    else
    {
        compteur.innerHTML = j+":"+l+":"+k;
    }
    if (l>59)
    {
        l = 0;
        j++;
    }
    /*if (l<10)
    {
        if(k<10)
        {
            compteur.innerHTML = j+":0"+l+":0"+k;
        }
        else
        {
            compteur.innerHTML = j+":0"+l+":"+k;
        }
    }*/
}

var compteur = document.getElementById('compteur');

var tot = compteur.innerHTML;

var j = tot[0]+tot[1];

var l = tot[3]+tot[4];   //  minutes de la minuterie

var k = tot[6]+tot[7];    //  secondes de la minuterie

var minuterie = setInterval(minuterie, 1000);   // déclenche minuterie

