const btn = document.getElementById('btn');


btn.addEventListener('click', () => {
  const form = document.getElementById('lform');

  if (form.style.display === 'none') {
    // 👇️ this SHOWS the form
    form.style.display = 'block';
  } else {
    // 👇️ this HIDES the form
    form.style.display = 'none';
  }
});

const btns = document.getElementById('btns');

btns.addEventListener('click', () => {
    const sform = document.getElementById('sform');
  
    if (sform.style.display === 'none') {
      // 👇️ this SHOWS the form
      sform.style.display = 'block';
    } else {
      // 👇️ this HIDES the form
      sform.style.display = 'none';
    }
  });

  const btnu = document.getElementById('btnu');
  btnu.addEventListener('click', () => {
    const uform = document.getElementById('uform');
  
    if (uform.style.display === 'none') {
      // 👇️ this SHOWS the form
      uform.style.display = 'block';
    } else {
      // 👇️ this HIDES the form
      uform.style.display = 'none';
    }
  });