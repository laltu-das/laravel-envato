import { setTheme } from '..';
import type { CustomFlowbiteTheme } from '../../Components/Flowbite';

interface Props {
  theme?: CustomFlowbiteTheme;
}

export function ThemeServerInit({ theme }: Props) {
  setTheme(theme);

  return null;
}
