Adds a simple selector to allow CMS editors to apply CSS classes to specific elements.

By default, the extension is applied to all elements when installed.  It can be disabled on a per-element class basis, via yml

If the default ElementHolder template has been overridden, it needs to contain the '$VariantStyle' tag in order for this extension to work.

CSS classes are defined in yml, in a simple array which contains the classname and a friendly name for the CSS, eg:

```yaml
BiffBangPow\Extension\ElementColourExtension:
  styles:
    "light": "Light"
    "dark": "Dark"
    "white": "White"
    "darkblue": "Dark Blue"
```


By default, all elements will use the styles defined by the main yml config.  If required, the styles can be overridden at the element class level, making it possible to have different style options on different types of element, eg:

```yaml

BiffBangPow\Element\VideoHeroElement:
    inherit_config: false
    styles:
        "text-white": "White Text"
        "text-black": "Black Text"
        "text-primary": "Pink Text"

```


*Note:* the extension does NOT add any actual CSS for the colours.  That should be done in the application / project styles
