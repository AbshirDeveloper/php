import { Component, OnInit } from '@angular/core';
import { RouterModule } from '@angular/router';
import { AmanoTranComponent } from './amano-tran/amano-tran.component';
import { FilterPipe } from './amano-tran/filter.pipe';
import { AmanoService } from './amano/amano.service';
import {ActivatedRoute, Params, Router} from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  constructor( private data: AmanoService, private router:Router){}
  title = {
    name : 'Angular 2'
  }
authenticated:boolean;

set(){ 
if (window.localStorage.getItem('auth_key') == 'success'){   
this.authenticated = true;
}
}
abshir
out(){
  this.abshir = confirm('Are you sure you want to log out');

  if(this.abshir){

  window.localStorage.setItem('auth_key', 'failed');
  this.router.navigate(['log']);
  this.authenticated = false;
  } else {
    return false;
  }
}

w3_open() {
  if (document.getElementById("mySidebar").style.display === 'block') {
    document.getElementById("mySidebar").style.display = 'none';
    document.getElementById("myOverlay").style.display = "none";
  } else {
    document.getElementById("mySidebar").style.display = 'block';
    document.getElementById("myOverlay").style.display = "block";
  }
}

// Close the sidebar with the close button
w3_close() {
document.getElementById("mySidebar").style.display = "none";
document.getElementById("myOverlay").style.display = "none";
}

ngOnInit(){
  this.set();
    this.router.navigate(['home']);
    
}


// Get the Sidebar
// var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
// var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect



}
