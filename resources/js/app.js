import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import stamp from './stamp.js';
import stampRect from './stampRect.js';
import stampTransforms from './stampTransforms.js';
Alpine.data('stamp', stamp);
Alpine.data('stampRect', stampRect);
Alpine.data('stampTransforms', stampTransforms);


Livewire.start();

/* document.addEventListener('Alpine.initialized', () => {
  recreateTemplateInSvg(document);
});

function recreateTemplateInSvg(node) {
  node.querySelectorAll('svg x\\:template').forEach((el) => {
    const template = el.ownerDocument.createElement('template');

    for (const attr of el.attributes) {
      template.setAttributeNode(attr.cloneNode());
    }
    template.content.append(...el.children);

    el.replaceWith(template);
  });

  node.querySelectorAll('template').forEach((el) => {
    recreateTemplateInSvg(el.content);
  });
} */


(function(){
        var templates = document.querySelectorAll('svg template');
        var el, template, attribs, attrib, count, child, content;
        for (var i=0; i<templates.length; i++) {
          el = templates[i];
          template = el.ownerDocument.createElement('template');
          el.parentNode.insertBefore(template, el);
          attribs = el.attributes;
          count = attribs.length;
          while (count-- > 0) {
            attrib = attribs[count];
            template.setAttribute(attrib.name, attrib.value);
            el.removeAttribute(attrib.name);
          }
          el.parentNode.removeChild(el);
          content = template.content;
          while ((child = el.firstChild)) {
            content.appendChild(child);
          }
        }
      })();
