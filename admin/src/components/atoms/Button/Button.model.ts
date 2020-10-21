export type ButtonType = 'fill' | 'outline' | 'disabled' | 'transparent' | undefined;

export interface IButton {
  children: string;
  type?: ButtonType;
  className?: string;
}
