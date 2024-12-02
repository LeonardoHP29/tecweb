console.log('El archivo JavaScript se ha cargado correctamente.');

function toggleForms() {
    const formLabel = document.getElementById('formLabel');
    const toggle = document.getElementById('toggleForm');
    const loginTab = document.getElementById('tab-login');
    const registerTab = document.getElementById('tab-register');
    const loginPane = document.getElementById('pills-login');
    const registerPane = document.getElementById('pills-register');
    const containers = document.getElementsByClassName('container');
    const logoContainer = document.getElementById('logoContainer');
  
    if (toggle.checked) {
      formLabel.textContent = 'Registrarse';
      // Muestra el panel de registro y oculta el de inicio de sesión
      loginTab.classList.remove('active');
      loginPane.classList.remove('show', 'active');
      registerTab.classList.add('active');
      registerPane.classList.add('show', 'active');
       // Ajustar padding para registro
       for (let container of containers) {
        container.style.paddingTop = '200px';
      }
    } else {
      formLabel.textContent = 'Iniciar sesión';
      // Muestra el panel de inicio de sesión y oculta el de registro
      registerTab.classList.remove('active');
      registerPane.classList.remove('show', 'active');
      loginTab.classList.add('active');
      loginPane.classList.add('show', 'active');
      // Ajustar padding para inicio de sesión
      for (let container of containers) {
        container.style.paddingTop = '20px';
    }
    }
    logoContainer.style.visibility = 'visible';
  }
  